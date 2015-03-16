{$this->headScript()->prependFile('/js/pages/rolecreate.js')|truncate:0:""}

<div class="panel panel-default">
    <div class="panel-heading">Neue Rolle</div>
    <div class="panel-body">
        <form id="multiselectForm" action="{$this->url()}" method="POST">

            <div class="form-group">

                <label for="inputName">Name</label>

                <input type="text" class="form-control" id="inputName" name="name" value="{$role->getName()}" placeholder="Name">

            </div>

            <div class="form-group">

                <label for="description">Beschreibung</label>

                <textarea class="form-control" id="description" name="description" value="{$role->getDescription()}" rows="3"></textarea>

            </div>

            <div class="form-group">
                <label for="inputGroup">Gruppen</label><br/>

                <select class="form-control" name="group_select" id="inputGroup" multiple>
                    <option value="all">Alle</option>
                    {foreach $groups as $group}
                        <option value="{$group->getId()}" {if in_array($group->getId(),$selected)}selected="selected"{/if}>{$group->getName()}</option>
                    {/foreach}
                </select>

            </div>
            <input class="btn btn-block btn-primary" type="submit" name="create" value="Anlegen" />
        </form>
    </div>
</div>