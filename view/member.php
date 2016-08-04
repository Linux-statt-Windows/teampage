<?php $this->layout('template', ['title' => 'LsW Mitglieder - Übersicht']) ?>

<?php foreach($members as $member): ?>
    <?php $member = collect($member); ?>
    <div class="mdl-card mdl-cell mdl-shadow--2dp">
        <figure class="mdl-card__media mdl-color--primary">
            <img class="background" src="assets/img/backgroundPic/<?= $this->e($member->get('backgroundPic', 'fallback.png')) ?>">
            <img class="profilePic" src="assets/img/profilePic/<?= $this->e($member->get('profilePic', 'fallback.gif')) ?>">
        </figure>
        <br>
        <div class="mdl-card__title">
            <h1 class="mdl-card__title-text"><?= $this->e($member->get('name').' ('.$member->get('alias').')') ?></h1>
        </div>
        <div class="mdl-card__supporting-text">
            <ul class="mdl-list">
                <li><b>Abteilung: </b><?= $this->e($member->get('project')) ?></li>
                <li><b>Aufgaben: </b><?= $this->e($member->get('tasks')) ?></li>

                <?php if ($member->get('telegram')): ?>
                    <li><b>Telegram: </b><a href="https://telegram.me/<?= $this->e($member->get('telegram')) ?>">@<?= $this->e($member->get('telegram')) ?></a></li>
                <?php endif ?>

                <?php if ($member->get('email')): ?>
                    <li><b>E-Mail: </b><a href="mailto:<?= $this->e($member->get('email')) ?>"><?= $this->e($member->get('email')) ?></a></li>
                <?php endif ?>

                <?php if ($member->get('year')): ?>
                    <li><b>Alter: </b><?= $this->e($this->toAge($member->get('year'))) ?></li>
                <?php endif ?>

                <?php if ($member->get('location')): ?>
                    <li><b>Ort: </b><?= $this->e($member->get('location')) ?></li>
                <?php endif ?>

                <?php if ($member->get('motto')): ?>
                    <li><b>Motto: </b><?= $this->e($member->get('motto')) ?></li>
                <?php endif ?>
            </ul>
        </div>

        <?php if ($member->has('social')): ?>
        <div class="mdl-layout-spacer">
        </div>
        <div class="mdl-card__actions mdl-card--border">
            <?php $social = collect($member->get('social')); ?>

            <!--  Facebook  -->
            <?php if ($social->get('facebook')): ?>
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--facebook" target="_blank" href="https://www.facebook.com/<?= $this->e($social->get('facebook')) ?>" data-upgraded=",MaterialButton,MaterialRipple">
                    <i class="fa fa-facebook fa-fw"></i>Facebook<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                </a>
            <?php endif ?>

            <!--  Twitter  -->
            <?php if ($social->get('twitter')): ?>
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--twitter" target="_blank" href="https://twitter.com/<?= $this->e($social->get('twitter')) ?>" data-upgraded=",MaterialButton,MaterialRipple">
                    <i class="fa fa-twitter fa-fw"></i>Twitter<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                </a>
            <?php endif ?>

            <!--  Google+  -->
            <?php if ($social->get('google')): ?>
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--googleplus" target="_blank" href="https://plus.google.com/u/0/<?= $this->e($social->get('google')) ?>" data-upgraded=",MaterialButton,MaterialRipple">
                    <i class="fa fa-google-plus fa-fw"></i>Google+<span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 250.383px; height: 250.383px; transform: translate(-50%, -50%) translate(96px, 18px);"></span></span>
                </a>
            <?php endif ?>

            <!--  Github  -->
            <?php if ($social->get('github')): ?>
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--github" target="_blank" href="https://github.com/<?= $this->e($social->get('github')) ?>" data-upgraded=",MaterialButton,MaterialRipple">
                    <i class="fa fa-github fa-fw"></i>Github<span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span>
                </a>
            <?php endif ?>
        </div>
        <?php endif ?>
    </div>
<?php endforeach ?>
