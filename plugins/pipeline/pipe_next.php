<?php

if ($page == "pipe_next") {
    check_user_permission_force(['admin','employee']);

    $stmt = db_select('project', ['*'], ['id' => $id]);
    $project = $stmt->fetch();
    $team_id = $project['current_team'];
    $team_name = maj_get_name('team', $team_id);


    $stmt = db_select(
      'team',
      ['*'],
      ['id' => ['IN', $project['route']], 'id.' => ['>', $team_id]],
      'ORDER BY sort_order ASC LIMIT 1'
    );
    $team_to = $stmt->fetch();

    if (isset($_GET['to'])) {
        db_insert('project_team_transfer', [
          'project'=>$id,
          'team_from'=>$team_id,
          'team_to'=>$_GET['to'],
          'user'=>$user['id'],
          'date_of_transfer'=>date('Y-m-d')
        ]);
        db_update('project', ['current_team' => $_GET['to']], ['id' => $id]);
        header('Location: ?p=pipe_overview');
    }

    $project_name = maj_get_name('project', $id);
    $content .= <<<HTML
      <h1>$project_name</h1>
      <hr />
      <h3>Next Team</h3>
      <p>
        Use this if the project is ready to enter the next phase of development.
      </p>
      <p>
        <a href="?p=pipe_next&id=$id&to=${team_to['id']}" class="btn btn-primary">${team_to['name']} <i class="ti-arrow-right"></i></a>
      </p>
      <h3>Somewhere Else</h3>
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
    $content .= <<<HTML
  </p>
  <h3>Out of Route</h3>
  <p>
    Use this to send the project outside of the designated route. Only use this if you know what you're doing.
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
        'id' => ['NOT IN', $project['route']],
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
