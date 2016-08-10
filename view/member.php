<?php $this->layout('template', ['title' => 'LsW Mitglieder - Übersicht']) ?>

<?php foreach ($members as $member): ?>
    <?php $member = collect($member); ?>
    <div class="mdl-card mdl-cell mdl-shadow--3dp">
        <figure class="mdl-card__media mdl-color--primary">
            <img class="background"
                 src="assets/img/backgroundPic/<?= $this->e($member->get('backgroundPic', 'fallback.png')) ?>">
            <img class="profilePic"
                 src="assets/img/profilePic/<?= $this->e($member->get('profilePic', 'fallback.gif')) ?>">
        </figure>
        <br>
        <div class="mdl-card__title">
            <h1 class="mdl-card__title-text"><?= $this->e($member->get('name') . ' (' . $member->get('alias') . ')') ?></h1>
        </div>
        <div class="mdl-card__supporting-text">
            <b>Abteilung: </b><?= $this->e($member->get('project')) ?><br/>
            <b>Aufgaben: </b><?= $this->e($member->get('tasks')) ?><br/>

            <?php if ($member->get('telegram')): ?>
                <b>Telegram: </b><a
                    href="https://telegram.me/<?= $this->e($member->get('telegram')) ?>">@<?= $this->e($member->get('telegram')) ?></a>
                <br/>
            <?php endif ?>

            <?php if ($member->get('email')): ?>
                <b>E-Mail: </b><a
                    href="mailto:<?= $this->e($member->get('email')) ?>"><?= $this->e($member->get('email')) ?></a><br/>
            <?php endif ?>

            <?php if ($member->get('jabber')): ?>
                <b>Jabber: </b><a
                    href="xmpp:<?= $this->e($member->get('jabber')) ?>"><?= $this->e($member->get('jabber')) ?></a><br/>
            <?php endif ?>

            <?php if ($member->get('homepage')): ?>
                <b>Homepage: </b><a
                    href="http://<?= $this->e($member->get('homepage')) ?>"><?= $this->e($member->get('homepage')) ?></a>
                <br/>
            <?php endif ?>

            <?php if ($member->get('year')): ?>
                <b>Alter: </b><?= $this->e($this->toAge($member->get('year'))) ?><br/>
            <?php endif ?>

            <?php if ($member->get('location')): ?>
                <b>Ort: </b><?= $this->e($member->get('location')) ?><br/>
            <?php endif ?>

            <?php if ($member->get('motto')): ?>
                <b>Motto: </b><?= $this->e($member->get('motto')) ?><br/>
            <?php endif ?>
        </div>

        <?php if ($member->has('social')): ?>
            <div class="mdl-layout-spacer">
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <?php $social = collect($member->get('social')); ?>

                <!--  Facebook  -->
                <?php if ($social->get('facebook')): ?>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--facebook"
                       target="_blank" href="https://www.facebook.com/<?= $this->e($social->get('facebook')) ?>"
                       data-upgraded=",MaterialButton,MaterialRipple">
                        <i class="fa fa-facebook fa-fw"></i><span class="mdl-button__ripple-container"><span
                                class="mdl-ripple"></span></span>
                    </a>
                <?php endif ?>

                <!--  Twitter  -->
                <?php if ($social->get('twitter')): ?>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--twitter"
                       target="_blank" href="https://twitter.com/<?= $this->e($social->get('twitter')) ?>"
                       data-upgraded=",MaterialButton,MaterialRipple">
                        <i class="fa fa-twitter fa-fw"></i><span class="mdl-button__ripple-container"><span
                                class="mdl-ripple"></span></span>
                    </a>
                <?php endif ?>

                <!--  Google+  -->
                <?php if ($social->get('google')): ?>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--googleplus"
                       target="_blank" href="https://plus.google.com/u/0/<?= $this->e($social->get('google')) ?>"
                       data-upgraded=",MaterialButton,MaterialRipple">
                        <i class="fa fa-google-plus fa-fw"></i><span class="mdl-button__ripple-container"><span
                                class="mdl-ripple is-animating"
                                style="width: 250.383px; height: 250.383px; transform: translate(-50%, -50%) translate(96px, 18px);"></span></span>
                    </a>
                <?php endif ?>

                <!--  Github  -->
                <?php if ($social->get('github')): ?>
                    <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--github"
                       target="_blank" href="https://github.com/<?= $this->e($social->get('github')) ?>"
                       data-upgraded=",MaterialButton,MaterialRipple">
                        <i class="fa fa-github fa-fw"></i><span class="mdl-button__ripple-container"><span
                                class="mdl-ripple"></span></span>
                    </a>
                <?php endif ?>

            </div>
        <?php endif ?>
    </div>
<?php endforeach ?>
