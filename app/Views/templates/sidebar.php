<?php

function isActiveNav($nav, $link) {
    return $nav === $link ? 'active font-weight-bold' : '';
};

?>
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <i class="fas fa-fire"></i> <strong>Assignment</strong>
    </div>
    <div class="list-group rounded-0">
        <a href="/" class="list-group-item list-group-item-action <?=isActiveNav($activenav, 'home');?>">
            Produk
        </a>
        <a href="/profile" class="list-group-item list-group-item-action <?=isActiveNav($activenav, 'profile');?>">
            Profil
        </a>
        <a href="#" id="logoutlink" class="list-group-item list-group-item-action">
            Logout
        </a>
    </div>
</div>
