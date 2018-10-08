<?php

if ($page == 'wiki') {
    if (!isset($_GET['w'])) {
        die(get_404());
    }
    $stmt = db_select('wiki_page', ['*'], ['name'=>$_GET['w']]);
    $wiki_page = $stmt->fetch();
    if (!$wiki_page) {
        header("Location: ?p=add&t=wiki_page&d={\"name\":\"${_GET['w']}\"}");
    }
    function reformat_markdown($text)
    {
        global $field_types;
        $text = $field_types['markdown']['decode'](null, $text);
        $text = preg_replace("/\[\[(.*?)\]\]/", "<a href='?p=wiki&w=$1'>$1</a>", $text);
        return $text;
    }
    $wiki_page['content'] = reformat_markdown($wiki_page['content']);
    $breadcrumbs = "<li class='breadcrumb-item active'>${wiki_page['name']}</li>";
    $parent_id = $wiki_page['parent'];
    while ($parent_id) {
        $parent_name = maj_get_name('wiki_page', $parent_id);
        $parent_name_url = urlencode($parent_name);
        $breadcrumbs = <<<HTML
        <li class='breadcrumb-item'>
          <a href='?p=wiki&w=$parent_name_url' style="color: inherit;">
            $parent_name
          </a>
        </li>
        $breadcrumbs
HTML;
        $stmt = db_select('wiki_page', ['name','parent'], ['id'=>$parent_id]);
        $parent = $stmt->fetch();
        $parent_id = $parent['parent'];
    }
    $stmt = db_select('wiki_page', ['*'], ['name'=>'_sidebar']);
    $sidebar = $stmt->fetch();
    $sidebar['content'] = reformat_markdown($sidebar['content']);
    $content .= <<<HTML
    <div style="float: right; display: inline;">
      <a href="?p=edit&t=wiki_page&id=${wiki_page['id']}">
        <i class="ti-pencil-alt"></i>
      </a>
    </div>
    <h1>${wiki_page['name']}</h1>
    <hr />
    <div style="display: flex; flex-direction: row; align-items: flex-start;">
      <div style="flex-grow: 1; min-width: 300px;margin-right: 10px;">
        <ol class="breadcrumb" style="padding: 0px; margin-top: 0px;">
          $breadcrumbs
        </ol>
        <div>
          ${wiki_page['content']}
        </div>
      </div>
      <div class="card-box" style="min-width: 300px;">
        <div style="float: right; display: inline;">
          <a href="?p=edit&t=wiki_page&id=${sidebar['id']}">
            <i class="ti-pencil-alt"></i>
          </a>
        </div>
        <h3>Table of Contents</h3>
        <hr />
        ${sidebar['content']}
      </div>
    </div>
HTML;
}
