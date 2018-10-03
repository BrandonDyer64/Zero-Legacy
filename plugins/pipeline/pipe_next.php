<?php

if ($page == "pipe_next") {
    check_user_permission_force(['admin','employee']);

    $stmt = db_select('j_user_team', ['*'], ['user'=>$user['id']]);
    $j_team = $stmt->fetch();
    $team_id = $j_team['team'];
    $team_name = maj_get_name('team', $team_id);

    $stmt = db_select('project', ['*'], ['id' => $id]);
    $project = $stmt->fetch();

    $stmt = db_select(
      'team',
      ['*'],
      ['id' => ['IN', $project['route']], 'id.' => ['>', $team_id]],
      'ORDER BY sort_order ASC LIMIT 1'
    );
    $team_to = $stmt->fetch();

    if (isset($_GET['next'])) {
        db_update('project', ['current_team' => $team_to['id']], ['id' => $id]);
        header('Location: ?p=pipe_overview');
        exit;
    }

    if (isset($_GET['to'])) {
        db_update('project', ['current_team' => $_GET['to']], ['id' => $id]);
        header('Location: ?p=pipe_overview');
    }

    $project_name = maj_get_name('project', $id);
    $content .= <<<HTML
      <h3>$project_name</h3>
      <p>
        Use this if the project is ready to enter the next phase of development.
      </p>
      <p>
        <a href="?p=pipe_next&id=$id&next" class="btn btn-primary">${team_to['name']} <i class="ti-arrow-right"></i></a>
      </p>
      <h5>Somewhere Else</h5>
      <p>
        Use this if the project should be sent somewhere else for additional development.
      </p>
      <p>
HTML;

    $stmt = db_select('project', ['*'], ['id' => $id]);
    $project = $stmt->fetch();

    $teams = explode(',', $project['route']);
    $stmt = db_select(
      'team',
      ['*'],
      [
        'id' => ['IN', $project['route']],
        'id.' => ['!=', $team_id],
        'id..' => ['!=', $team_to['id']]
      ],
      'ORDER BY sort_order ASC'
    );
    while ($team = $stmt->fetch()) {
        $content .= <<<HTML
        <a href="?p=pipe_next&id=$id&to=${team['id']}" class="btn btn-secondary" style="margin-bottom: 5px;">${team['name']}</i></a>
HTML;
    }
    $content .= "</p>";
}
