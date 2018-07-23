

    <?php
 
    echo "<br>";
    $attributes = array('class' => 'email ui large form', 'id' => 'myform','autocomplete'=> 'off');
 
    ?>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">

                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <?php
            echo form_open('', $attributes);
            ?>

                <div class="ui stacked segment">
                    <div class="field">
                        <label  for="userid">user id </label>
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="userid" placeholder="ID">
                        </div>
                    </div>
                    <div class="field">
                        <label  for="userpass">user password</label>
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="userpass" placeholder="Password">
                        </div>
                    </div>
                    <div class="ui  message">
                        <p id="ajaxCheck" class="header"> 請輸入帳密... </p>

                    </div>

                        <input class="ui fluid large teal submit button" type="submit" name="mysubmit" value="Login!">

                </div>

                <div class="ui error message"></div>

                <?php  echo form_close(); ?>

            <div class="ui message">
                New to us? <a href="#">Sign Up</a>
            </div>
        </div>
    </div>
 
