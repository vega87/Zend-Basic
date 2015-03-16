{$this->headScript()->prependFile('/js/pages/groupcreate.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Neue Gruppe</div>
    <div class="panel-body">
        <form id="multiselectForm" action="{$this->url()}" method="POST">

            <div class="form-group">

                <label for="inputName">Name</label>

                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">

            </div>

            <div class="form-group">

                <label for="description">Beschreibung</label>

                <textarea class="form-control" id="description" name="description" rows="3"></textarea>

            </div>

            <div class="form-group">
                <label for="inputRole">Rollen zuweisen</label><br/>

                <select class="form-control" name="role_select" id="inputRole" multiple>
                    <option value="">keine Zuweisung</option>
                    <option value="all">Alle</option>
                    {foreach $roles as $role}
                        <option value="{$role->getId()}">{$role->getName()}</option>
                    {/foreach}
                </select>

            </div>
            <input class="btn btn-block btn-primary" type="submit" name="create" value="Anlegen" />
        </form>
    </div>
</div>

