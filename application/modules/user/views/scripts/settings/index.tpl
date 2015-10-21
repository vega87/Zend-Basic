{$this->headScript()->prependFile('/js/pages/settings.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Einstellungen</div>
    <div class="panel-body">
        <form id="multiselectForm" action="{$this->url()}" method="POST">

            <div class="form-group">

                <label for="inputName">Vorname</label>

                <input type="text" class="form-control" id="inputName" name="fname" value="{$user->getFirstname()}" placeholder="Name">

            </div>

            <div class="form-group">

                <label for="inputName">Nachname</label>

                <input type="text" class="form-control" id="inputName" name="lname" value="{$user->getLastname()}" placeholder="Name">

            </div>

            <div class="form-group">

                <label for="description">E-Mail</label>

                <input type="text" class="form-control" id="inputName" name="email" value="{$user->getEmail()}" placeholder="Name">

            </div>

            {if $loggedinUser->getRole()->getMetaKey() == "ADMIN"}
            <div class="form-group">
                <label for="inputRole">Rollen zuweisen</label><br/>

                <select class="form-control" name="role_select" id="inputRole">
                    <option value="">keine Zuweisung</option>
                    <option value="all">Alle</option>
                    {foreach $roles as $role}
                        <option value="{$role->getId()}" {if $role->getId() == $user->getRole()->getId()}selected{/if}>{$role->getName()}</option>
                    {/foreach}
                </select>

            </div>
            {/if}

            <input class="btn btn-block btn-primary" type="submit" name="edit" value="Speichern" />
        </form>
    </div>
</div>

