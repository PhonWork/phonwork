          <form method="post" id="email_form" action="process.php">
            <div class="field half first">
              <input type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div class="field half">
              <input type="email" name="email" id="email" placeholder="Email" />
            </div>
            <div class="field">
              <textarea name="message" id="message" placeholder="Message"></textarea>
            </div>
            <ul class="actions">
              <li><input type="button" value="Send" class="special" onclick="submit_email_comment()" /></li>
            </ul>
          </form>
  