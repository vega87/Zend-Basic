<div class="panel panel-default">
    <div class="panel-heading">Neues Passwort</div>
    <div class="panel-body">
        <form action="<?= $this->url('zfcadmin/users', array('action'=>'create')) ?>" method="POST">
            <div class="form-group">

                <label for="inputName">Name</label>

                <input type="text" class="form-control" id="inputName" name="name" placeholder="Benutzername">

            </div>

            <div class="form-group">

                <label for="inputPassword">Password</label>

                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">

            </div>

            <div class="form-group">

                <label for="description">Beschreibung</label>

                <textarea class="form-control" id="description" name="description" rows="3"></textarea>

            </div>

            <div class="form-group">

                <label for="roleId">Gruppe</label>

                <select data-placeholder="Rolle" class="form-control chosen-select" id="roleId" name="roleId">
                    <option value="">Bitte wählen</option>

                    {foreach $groups as $group}
                        <option value="{$group->getId()}">{$group->getName()}</option>
                    {/foreach}
                </select>

            </div>


            <input class="btn btn-block btn-primary" type="submit" name="create" value="Anlegen" />
        </form>
    </div>
</div>

