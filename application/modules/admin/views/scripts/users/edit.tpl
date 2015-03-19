<div class="panel panel-default">
    <div class="panel-heading">Neue Rolle</div>
    <div class="panel-body">
        <form id="multiselectForm" action="{$this->url()}" method="POST">

            <div class="form-group">

                <label for="inputFName">Vorname</label>

                <input type="text" class="form-control" value="{$user->getFirstname()}" id="inputFName" name="fname" placeholder="Vorname">

            </div>

            <div class="form-group">

                <label for="inputLName">Nachname</label>

                <input type="text" class="form-control" value="{$user->getLastname()}" id="inputLName" name="lname" placeholder="Nachname">

            </div>

            <div class="form-group">

                <label for="inputEMail">E-Mail</label>

                <input type="text" class="form-control" value="{$user->getEmail()}" id="inputEMail" name="email" placeholder="E-Mail">

            </div>

            <div class="form-group">
                <label for="inputRole">Rolle</label><br/>

                <select class="form-control" name="role" id="inputRole">
                    <option value="">Bitte wählen</option>
                    {foreach $roles as $role}
                        <option value="{$role->getId()}">{$role->getName()}</option>
                    {/foreach}
                </select>

            </div>

            <div class="form-group">

                <label for="inputEMail">Aktiv</label>

                <div class="{if $user->getActiv() == 1}state-active{else}state-inactive{/if}">{if $user->getActiv() == 1}Aktiv{else}Inaktiv{/if}</div>

            </div>

            <input class="btn btn-block btn-primary" type="submit" name="create" value="Anlegen" />
        </form>
    </div>
</div>

