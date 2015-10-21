<ul class="nav navbar-nav">
    <li class=""><a href="/">Home</a></li>
    <li class=""><a href="/user/password/">Passwörter</a></li>
    <li class=""><a href="/user/settings/">Einstellungen</a></li>
    {if $loggedinUser->getRole()->getMetaKey() == "ADMIN"}
        <li class=""><a href="/admin/users/">Nutzerverwaltung</a></li>
        <li class=""><a href="/admin/Role/">Rollenverwaltung</a></li>
        <li class=""><a href="/admin/Group/">Gruppenverwaltung</a></li>
    {/if}
    <li><a href="/index/logout/">Logout</a></li>
</ul>

{if $firstlogin == 1}
<div id="firstlogin" class="modal fade">

    <div class="modal-dialog">
        <form action="/user/settings/firstlogin/" method="post">
        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Erst Anmeldung</h4>

            </div>

            <div class="modal-body">

                <p class="text-warning"><small>Bitte ein neues Passwort vergeben</small></p>

                <p>Altes Passwort</p>

                <p><input type="password" name="old_password"></p>

                <p>Neues Passwort</p>

                <p><input type="password" name="new_password"></p>

                <p>Neues Passwort wiederholen</p>

                <p><input type="password" name="new_password_repeate"></p>

            </div>

            <div class="modal-footer">

                <input type="submit" value="Speichern" class="btn btn-primary">

            </div>

        </div>
        </form>
    </div>

</div>
{/if}