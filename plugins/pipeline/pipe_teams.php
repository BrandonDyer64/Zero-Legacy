<?php
if ($page == "pipe_teams") {
    check_user_permission_force(['admin','employee']);
    $is_admin = check_user_permission(['admin']);
    $stmt_pipes = db_select('pipeline', ['*'], ['1'=>'1']);
    while ($pipeline = $stmt_pipes->fetch()) {
        $pipeline_content = '';
        $stmt_teams = db_select('team', ['*'], ['pipeline'=>$pipeline['id']], 'ORDER BY sort_order ASC');
        while ($team = $stmt_teams->fetch()) {
            $team_content = '';
            $stmt_members = db_select('j_user_team', ['*'], ['team'=>$team['id']]);
            while ($member = $stmt_members->fetch()) {
                $stmt_user = db_select('user', ['*'], ['id'=>$member['user']]);
                $member = $stmt_user->fetch();
                $name = $member['full_name'] ? $member['full_name'] : $member['username'];
                if ($member['discord_id']) {
                    $discord = <<<HTML
                  - <a href="https://discordapp.com/users/${member['discord_id']}" target="_blank">
                    Discord
                  </a>
HTML;
                } else {
                    $discord = '';
                }
                if (!$is_admin) {
                    $team_content .= "$name$discord <br />";
                } else {
                    $team_content .= <<<HTML
                    <a href="?p=display&t=user&id=${member[id]}">
                      $name
                    </a>$discord<br />
HTML;
                }
            }
            $pipeline_content .= <<<HTML
            <div class="time-item">
              <div class="item-info">
                <b>${team['name']}</b>
                <p>
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
