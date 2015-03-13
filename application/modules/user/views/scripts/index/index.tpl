{$this->headLink()->prependStylesheet('/css/pages/dashboard.css')|truncate:0:""}
<div class="row dashboard">
    <div class="col-sm-6 col-md-4 col-lg-2">
        <a href="/user/password/">
            <div class="dashboardicon_inner">
                <i class="fa fa-key"></i><br/><span class="icon_name">Passwörter</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-2">
        <a href="#">
            <div class="dashboardicon_inner">
                <i class="fa fa-cog"></i><br/><span class="icon_name">Einstellungen</span>
            </div>
        </a>
    </div>
</div>
{if $loggedinUser->getRole()->getKey() == "ADMIN"}
<hr>
<div class="row dashboard">
    <div class="col-sm-6 col-md-4 col-lg-2">
        <a href="#">
            <div class="dashboardicon_inner">
                <i class="fa fa-users"></i><br/><span class="icon_name">Nutzerverwaltung</span>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-2">
        <a href="#">
            <div class="dashboardicon_inner">
                <i class="fa fa-list"></i><br/><span class="icon_name">Rollenverwaltung</span>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-2">
        <a href="#">
            <div class="dashboardicon_inner">
                <i class="fa fa-sitemap"></i><br/><span class="icon_name">Gruppenverwaltung</span>
            </div>
        </a>
    </div>
</div>
{/if}