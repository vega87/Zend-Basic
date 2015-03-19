<ul class="nav navbar-nav">
    <li class=""><a href="/">Home</a></li>
    <li class=""><a href="/user/password/">Passwörter</a></li>
    <li class=""><a href="#">Einstellungen</a></li>
    {if $loggedinUser->getRole()->getMetaKey() == "ADMIN"}
        <li class=""><a href="/admin/users/">Nutzerverwaltung</a></li>
        <li class=""><a href="/admin/Role/">Rollenverwaltung</a></li>
        <li class=""><a href="/admin/Group/">Gruppenverwaltung</a></li>
    {/if}
    <li><a href="/index/logout/">Logout</a></li>
</ul>