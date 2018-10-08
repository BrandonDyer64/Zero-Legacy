<?php
if ($page == "pipe_overview") {
    check_user_permission_force(['admin','employee']);
    $is_admin = check_user_permission(['admin']);
    $stmt_pipes = db_select('pipeline', ['*'], ['1'=>'1']);
    while ($pipeline = $stmt_pipes->fetch()) {
        $pipeline_content = '';
        $stmt_teams = db_select('team', ['*'], ['pipeline'=>$pipeline['id']], 'ORDER BY sort_order ASC');
        while ($team = $stmt_teams->fetch()) {
            $team_content = '';
            $stmt_projects = db_select('project', ['*'], ['current_team'=>$team['id']]);
            while ($project = $stmt_projects->fetch()) {
                $team_content .= <<<HTML
                  ${project['id']} -
                  <a href="?p=display&t=project&id=${project['id']}">
                    ${project['name']}
                  </a>
HTML;
                if ($is_admin) {
                    $team_content .= <<<HTML
                      <a href="?p=pipe_next&id=${project['id']}" style="float: right;">
                        <i class="ti-arrow-right"></i>
                      </a>
HTML;
                }
                $team_content .= "<br />";
            }
            $pipeline_content .= <<<HTML
            <div class="time-item">
              <div class="item-info">
                <b>${team['name']}</b>
                <p style="max-width: 200px;">
                    $team_content
                </p>
              </div>
            </div>
HTML;
        }
        $content .= <<<HTML
        <h3>${pipeline['name']}</h3>
        <div class="timeline-2">
          $pipeline_content
        </div>
HTML;
    }
}
