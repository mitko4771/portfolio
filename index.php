<?php include('simple_mail.php'); ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
              crossorigin="anonymous">
        </script>
        <title>Mitko's portfolio</title>
    </head>
    <body>

        <main>
            <nav>
                <header>
                    <section class="logo-nav section-header">
                        <p class="logo">mitko's portfolio</p>
                    </section>
                    <section class="ul-nav section-header">
                            <ul>
                                <li><a href="#skills" class="menu">skills</a></li>
                                <li><a href="#works" class="menu">work</a></li>
                                <li><a href="#contacts" class="menu">contacts</a></li>
                            </ul>
                    </section>
                </header>
            </nav>

            <aside>
                <section id="divHolder">
                    <div id="asideTop">
                        <h1>Let me introduce myself</h1>
                    </div>
                    <div id="asideMiddle">
                        <article>
                            My name is Mitko Dimitrov, an average guy from Sofia with a dream to build a career as great Front-End Developer.
                             This is my current portfolio - short for the moment but not for too long. 
                             So, please take a look ...and feel free to contact me if you like what you see or just for a talk. Cheers!
                        </article>
                    </div>
                    <div id="asideBottom">
                        <section id="btnGoDownSection">
                            <button id="goDownBtn">explore</button>
                        </section>
                    </div>
                </section>
            </aside>

            <section id="skills">
                <div class="left skills-div">
                    <h3>skills</h3>
                    <ul>
                        <li class="skills-list-item">HTML</li>
                        <li class="skills-list-item">CSS</li>
                        <li class="skills-list-item">Less</li>
                        <li class="skills-list-item">JavaScript</li>
                        <li class="skills-list-item">jQuery</li>
                        <li class="skills-list-item">Git</li>
                    </ul>
                </div>
                <div class="right skills-div"></div>
            </section>

            <section id="works">
                <div id="headerProjectSection">
                    <h2>2. work</h2>
                    <hr>
                    <p>The following projects are some exercises made while learning programming</p>
                </div>
                <div id="projectSection">
                    <div id="flexLeftSide">
                        <ul class="list">
                            <li class="list_item">
                                <input type="radio" name="projects" value="example-site" class="radio-btn" id="example-site">
                                <label for="example-site" class="label">Example site</label>
                            </li>
                            <li class="list_item">
                                <input type="radio" name="projects" value="number-facts" class="radio-btn" id="number-facts">
                                <label for="number-facts" class="label">Number facts</label>
                            </li>
                            <li class="list_item">
                                <input type="radio" name="projects" value="filterable-list" class="radio-btn" id="filterable-list">
                                <label for="filterable-list" class="label">Filterable list</label>    
                            </li>
                            <li class="list_item">
                                <input type="radio" name="projects" value="basic-image-slider" class="radio-btn" id="basic-image-slider">
                                <label for="basic-image-slider" class="label">Basic image slider</label>
                            </li>
                        </ul>
                    </div>
                    <div id="flexRightSide">
                        <div id="outputFromRadioBtn"></div>
                        <button id="btnRedirect">See the code in GitHub</button>
                    </div>
                </div>
            </section>

            <address id="contacts">
                <div>
                    <h2>3. contact</h2>
                    <hr>
                    <h3>How to contact me? Fill the form or call me. Phone number is bellow.</h3>
                </div>

                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset>
                        <label for="yournames">Your names*</label>
                        <input type="text" value="<?php echo $yournames; ?>"  placeholder="Your names*" name="yournames" id="yournames" required>
                        <?php if(isset($errors['yournames'])){echo '<span class="error">' . $errors['yournames']. '</span>'; } ?>
                        <label for="email">Your email*</label>
                        <input type="text" value="<?php echo $email; ?>"  placeholder="Your email*" name="email" id="email" required>
                        <?php if(isset($errors['email'])){echo '<span class="error">' . $errors['email']. '</span>'; } ?>
                        <textarea id="message" name="message" placeholder="Write me something*" required><?php echo $message; ?></textarea>
                        <?php if(isset($errors['message'])){echo '<span class="error">' . $errors['message'] . '</span>'; } ?>
                        <button type="submit" id="contact_submit" name="contact_submit">SUBMIT</button>
		                <?php
							if(!empty($system_msg)) {
								echo "<div class=\"msg\">";
								foreach ($system_msg as $message) {
									echo "<p style=\"color:green;\" >" . $message . "</p>";
								}
								echo "</div>";
							}
		                ?>

                    </fieldset>
                </form>
                <hr>
                <div id="phoneAndSocial">
                    <div id="linkedinAndPhone">
                        <p>0897 263 283</p>
                        <p>/</p>
                        <p><a href="https://www.linkedin.com/in/dimitar-dimitrov-a0b573142/" target="_blank">linkedin</a></p>
                    </div>
                </div>
            </address>

            <section id="go-up-button">
                <button class="scrollToTop">up</button>
            </section>

            <footer>
                <p>created by me</p>
            </footer>
        </main>
        <script src="js/main.js"></script>
        <script src="jquery/jQueryMain.js"></script>
    </body>
</html>