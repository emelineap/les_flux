<?php

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Il semble que vous soyez un robot (ou très nul.le en maths).";
  $missing_content = "Merci de bien vouloir remplir tous les champs.";
  $email_invalid   = "Votre adresse email est invalide.";
  $message_unsent  = "Votre message n'a pas été envoyé. Merci de réessayer.";
  $message_sent    = "Votre message a bien été envoyé, merci !";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Quelqu'un a envoyé un message pour ".get_bloginfo('name');
  $headers = 'De la part de : '. $email . "\r\n" .
    'Répondre à : ' . $email . "\r\n";

  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>


  <div id="primary" class="site-content">
    <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">
<!--              <h1 class="entry-title"><?php /*the_title(); */?></h1>
-->
                <h3 class="posts-page-title">CONTACTEZ-NOUS</h3>
            </header>

            <div class="entry-content contact-form">
              <?php the_content(); ?>

              <div id="respond">
                <?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post">
                  <p><label for="name">Nom : <span>*</span> <br><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></label></p>
                  <p><label for="message_email">Email : <span>*</span> <br><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></label></p>
                  <p><label for="message_text">Message : <span>*</span> <br><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></label></p>
                  <p><label for="message_human">Montrez que vous n'êtes pas un robot en résolvant cette opération très difficile : <span>*</span> <br><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</label></p>
                  <input type="hidden" name="submitted" value="1">
                  <p class="contact-submit"><input type="submit" class="contact-input"></p>
                </form>
              </div>


            </div><!-- .entry-content -->

          </article><!-- #post -->

      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>