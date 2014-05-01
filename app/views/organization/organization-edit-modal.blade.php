<div id="ModalOrganizationEdit" class="modal fade" data-backdrop="true" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" class="form-horizontal" name="OrganizationEditForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Update Organization Information</h3>
                </div>

                <div id="notification-organization-edit"></div>

                <input type="hidden" name="id" ng-value="[[ organization.id ]]" />

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" ng-model="organization.title" />
                            </div>

                            <div class="form-group">
                                <label for="subTitle">SubTitle</label>
                                <input type="text" name="subTitle" class="form-control" ng-model="organization.subTitle" />
                            </div>

                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" class="form-control" ng-model="organization.website" />
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" rows="10" style="width:90%;" ng-model="organization.description"></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control" ng-model="organization.mobile" />
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" ng-model="organization.phone" />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" ng-model="organization.email" style="width: 243px;" />
                            </div>

                            <div class="form-group">
                                <label for="Address">Address</label>
                                <textarea name="address" rows="10" style="width:90%;" ng-model="organization.address"></textarea>
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
    </div>
</div>