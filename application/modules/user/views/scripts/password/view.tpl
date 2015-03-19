{$this->headScript()->prependFile('/js/pages/passwordview.js')|truncate:0:""}
<div class="panel panel-default">
    <div class="panel-heading">Passwort</div>
    <div class="panel-body">
        <div class="form-group">

            <label for="inputName">Name</label>

            <div>{$password->getName()}</div>

        </div>

        <div class="form-group">

            <label for="description">Beschreibung</label>

            <div>{$password->getDescription()}</div>

        </div>

        <div class="form-group">

            <label for="roleId">Gruppe</label>

            <div>{$password->getGroup()->getName()}</div>

        </div>

        <div class="form-group">

            <label for="inputPassword">Password</label>

            <div id="show-password" class="icon-div zoom"></div>

        </div>

    </div>
</div>
<input type="hidden" value="{$password->getId()}" name="passwordId" id="pid">

