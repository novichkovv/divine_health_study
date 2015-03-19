<h1>Signature Creator</h1>
<form method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo stripcslashes($_POST['name']); ?>">
            </div>
            <div class="form-group">
                <label>Title: </label>
                <input type="text" name="title" class="form-control" value="<?php echo stripcslashes($_POST['title']); ?>">
            </div>
            <div class="form-group">
                <label>Extension: </label>
                <input type="text" name="extension" class="form-control" value="<?php echo stripcslashes($_POST['extension']); ?>">
            </div>
            <div class="form-group">
                <label>Email Address:</label>
                <input type="text" name="email" class="form-control" value="<?php echo stripcslashes($_POST['email']); ?>">
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
</form>
<br>
<?php if ($_POST['name'] !== NULL) : ?>
    <div class="row">
        <div class="col-sm-10">
        <pre>
        <p>&lt;br&gt;<br>
            &lt;img src=&quot;http://www.drcolbert.com/files/images/dhlogo_email.png&quot; alt=&quot;Divine Health - Dr. Colbert&quot;&gt;&lt;/p&gt;<br>
            &lt;table border=&quot;0&quot;&gt;<br>
            &lt;tbody&gt;<br>
            &lt;tr valign=&quot;top&quot;&gt;<br>
            &lt;td style=&quot;text-align: left;&quot;&gt;&lt;span style=&quot;font-size: small;&quot;&gt;&lt;span style=&quot;color: #808080;&quot;&gt;&lt;strong class=&quot;text-color theme-font&quot;&gt;<?php echo $_POST['name']; ?>&lt;/strong&gt;,&amp;nbsp;&lt;span style=&quot;color: #888888;&quot;&gt;&lt;em&gt;<?php echo $_POST['title']; ?>&lt;br&gt;&lt;/em&gt;&lt;/span&gt;&lt;span style=&quot;color: #888888;&quot;&gt;&lt;em&gt;Divine Health, Inc.&lt;/em&gt;&lt;/span&gt;&lt;/span&gt;&lt;/span&gt;&lt;br&gt;<br>
            &lt;div style=&quot;margin-top: 0px; margin-bottom: 0px;&quot;&gt;&lt;span style=&quot;font-size: small;&quot;&gt;&lt;span style=&quot;color: #808080;&quot;&gt;Tel: (407) 732-6952 ext <?php echo $_POST['extension']; ?>&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;<br>
            &lt;span style=&quot;font-size: small;&quot;&gt;&lt;span style=&quot;color: #666699;&quot;&gt;&lt;a href=&quot;mailto:<?php echo $_POST['email']; ?>&quot;&gt;<?php echo $_POST['email']; ?>&lt;/a&gt;&lt;/span&gt;&lt;span class=&quot;text-color&quot;&gt; | &lt;/span&gt;&lt;span style=&quot;color: #666699;&quot;&gt;&lt;a href=&quot;http://www.drcolbert.com&quot;&gt;www.drcolbert.com&lt;/a&gt;&lt;br&gt;&lt;/span&gt;&lt;/span&gt;&lt;/td&gt;<br>
            &lt;/tr&gt;<br>
            &lt;/tbody&gt;<br>
            &lt;/table&gt;&lt;div style=&quot;clear:both&quot;&gt;&lt;/div&gt;&lt;/div&gt;&lt;a href=&quot;https://www.facebook.com/DonColbertMD&quot; style=&quot;text-decoration: underline&quot;&gt;&lt;img width=&quot;16&quot; height=&quot;16&quot; alt=&quot;Facebook&quot; style=&quot;padding: 0px 0px 5px 0px; vertical-align: middle;&quot; border=&quot;0&quot; src=&quot;https://www.drcolbert.com/files/images/emailicons/facebook.png&quot;&gt;&lt;/a&gt; &lt;a href=&quot;https://twitter.com/doncolbert&quot; style=&quot;text-decoration: underline&quot;&gt;&lt;img width=&quot;16&quot; height=&quot;16&quot; alt=&quot;Twitter&quot; style=&quot;padding: 0px 0px 5px 0px; vertical-align: middle;&quot; border=&quot;0&quot; src=&quot;https://www.drcolbert.com/files/images/emailicons/twitter.png&quot;&gt;&lt;/a&gt; &lt;a href=&quot;http://pinterest.com/divinehealth1/&quot; style=&quot;text-decoration: underline&quot;&gt;&lt;img width=&quot;16&quot; height=&quot;16&quot; alt=&quot;pinterest&quot; style=&quot;padding: 0px 0px 5px 0px; vertical-align: middle;&quot; border=&quot;0&quot; src=&quot;https://www.drcolbert.com/files/images/emailicons/pinterest.png&quot;&gt;&lt;/a&gt; &lt;a href=&quot;http://www.youtube.com/user/DonColbertMD&quot; style=&quot;text-decoration: underline&quot;&gt;&lt;img width=&quot;16&quot; height=&quot;16&quot; alt=&quot;YouTube&quot; style=&quot;padding: 0px 0px 5px 0px; vertical-align: middle;&quot; border=&quot;0&quot; src=&quot;https://www.drcolbert.com/files/images/emailicons/youtube.png&quot;&gt;&lt;/a&gt;&lt;br /&gt;&lt;p&gt;Confidentiality Notice:  This e-mail message, including any attachments, is for the sole use of the intended recipient(s) and may contain confidential and privileged information.  Any unauthorized review, use, disclosure or distribution is prohibited.  If you are not the intended recipient, please contact the sender by reply e-mail and destroy all copies of the original message.&lt;/p&gt;&lt;br /&gt;</p>
    </pre>
        </div>
    </div>
<?php endif; ?>
