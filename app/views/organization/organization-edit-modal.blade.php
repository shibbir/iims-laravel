<div id="ModalOrganizationEdit" class="modal hide fade in" data-backdrop="true" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="#" class="form-horizontal" name="OrganizationEditForm">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Update Organization Information</h3>
        </div>

        <div id="notification-organization-edit"></div>

        <input type="hidden" name="id" ng-value="[[ organization.id ]]" />

        <div class="modal-body">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="Title">Title</label>
                        <div class="controls">
                            <input type="text" name="title" class="input-xlarge" ng-model="organization.title" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="SubTitle">SubTitle</label>
                        <div class="controls">
                            <input type="text" name="subTitle" class="input-xlarge" ng-model="organization.subTitle" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Website">Website</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-globe"></i></span>
                                <input type="text" name="website" class="input-xlarge" ng-model="organization.website" style="width: 243px;" />
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Description">Description</label>
                        <div class="controls">
                            <textarea name="description" rows="10" style="width:90%;" ng-model="organization.description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="control-group">
                        <label class="control-label" for="Mobile">Mobile</label>
                        <div class="controls">
                            <input type="text" name="mobile" class="input-xlarge" ng-model="organization.mobile" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Phone">Phone</label>
                        <div class="controls">
                            <input type="text" name="phone" class="input-xlarge" ng-model="organization.phone" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Email">Email</label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="text" name="email" class="input-xlarge" ng-model="organization.email" style="width: 243px;" />
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="Address">Address</label>
                        <div class="controls">
                            <textarea name="address" rows="10" style="width:90%;" ng-model="organization.address"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-success" ng-click="updateOrganization()">
                <i class="icon-pencil icon-white"></i> Update
            </button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </form>
</div>