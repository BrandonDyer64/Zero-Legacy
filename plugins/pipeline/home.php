<?php

if (check_user_permission(['employee'])) {
    if (!table_exists('pipeline')) {
        run_remote_sql('pipeline');
    }
    $stmt = db_select('j_user_team', ['*'], ['user'=>$user['id']]);
    while ($j_team = $stmt->fetch()) {
        if (!$j_team) {
            return;
        }
        $team_id = $j_team['team'];
        $team_name = maj_get_name('team', $team_id);
        $content .= "<h4>$team_name</h4>";
        $stmt_1 = db_select('project', ['*'], ['current_team' => $team_id], 'ORDER BY id ASC');
        $content .= '<p>';
        if ($row = $stmt_1->fetch()) {
            $content .= <<<HTML
            <div class="card-box">
              <a href="?p=display&t=project&id=${row['id']}" style="color: inherit;"><b>${row['id']} - ${row['name']}</b></a>
              <span style="float: right;">
                <a href="?p=pipe_next&id=${row['id']}"><i class="ti-arrow-right"></i></a>
              </span>
            </div>
HTML;
        } else {
            $content .= "No projects yet.";
        }
        while ($row = $stmt_1->fetch()) {
            $content .= <<<HTML
                <a href="?p=display&t=project&id=${row['id']}" style="color: #343c49;"> ${row['id']} - ${row['name']}</a>
                <br />
HTML;
        }
        $content .= '</p>';
    }
}
