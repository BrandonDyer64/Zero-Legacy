<?php


if ($page == 'hive_mind_question') {
    if (isset($_POST['answer'])) {
        db_insert('hive_mind_answer', ['user'=>$user['id'],'answer'=>$_POST['answer'],'question'=>$id]);
    }
    $stmt = db_select('hive_mind_question',['*'],['id'=>$id]);
    if ($question = $stmt->fetch()) {
        $user_name = maj_get_name('user',$question['user']);
        $content .= <<<HTML
        <div>
            <h2>
                ${question['title']}
            </h2>
            <p>
                <em>
                    by $user_name
                </em>
            </p>
            <blockquote>
                <p>
                    ${question['question']}
                </p>
            </blockquote>
        </div>
        <div>
            <h4>
                Answers
            </h4>
        </div>
        <hr/>
HTML;
        $stmt_answer = db_select('hive_mind_answer',['*'],['question'=>$id]);
        while ($answer = $stmt_answer->fetch()) {
            $user_name_answer = maj_get_name('user',$answer['user']);
            $content .= <<<HTML
            <div>
                <blockquote>
                    <p>
                        ${answer['answer']}
                    </p>
                </blockquote>
                <p>
                    <!--<button type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-thumbs-up"></span>
                    </button>
                    &nbsp;
                    <span class="label label-default">
                        24
                    </span>-->
                    <span class="pull-right">
                        <b>
                            <em>
                                $user_name_answer
                            </em>
                        </b>
                    </span>
                </p>
                <br>
                <br>
            </div>
HTML;
        }
        $content .= <<<HTML
        <h3>Know the Answer?</h3>
        <form method="post">
            <div class="form-group">
                <textarea name="answer" class="form-control" placeholder="Answer"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" name="submit_answer" value="Submit">
            </div>
        </form>
HTML;
    } else {
        $content .= <<<HTML
        <h1>404</h1>
HTML;
    }
}