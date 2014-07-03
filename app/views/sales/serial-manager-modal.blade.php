<div id="ModalSerialManager" class="modal fade" data-backdrop="true" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Manage Product Serial</h3>
            </div>

            <div class="modal-body">
                <div data-ng-repeat="data in serialManager.serialNumbers">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <input type="text" placeholder="Enter Product Serial Number" class="form-control"
                                       data-ng-model="data.serial"
                                       data-ng-disabled="data.isValid || data.serialNumberNotApplicable" />
                                <span data-ng-if="data.isValid && !data.serialNumberNotApplicable" class="success">
                                    Serial number verified.
                                </span>
                                <span data-ng-if="!serialNumberCheckingInProgress && data.isChecked && !data.isValid && !data.serialNumberNotApplicable" class="error">
                                    Invalid serial number.
                                </span>
                                <span data-ng-if="data.serialNumberNotApplicable" class="info">
                                    Serial number not applicable.
                                </span>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <button type="button" class="btn btn-primary"
                                    data-ng-if="!data.isValid"
                                    data-ng-click="verifyProductSerial(selectedProduct.id, data)"
                                    data-ng-disabled="!data.serial || data.serialNumberNotApplicable">
                                <i class="fa fa-info-circle"></i> Check
                            </button>
                            <button type="button" class="btn btn-danger"
                                    data-ng-if="data.isValid"
                                    data-ng-click="clearProductSerial(data)">
                                <i class="fa fa-times"></i> Clear
                            </button>
                        </div>

                        <div class="col-xs-2">
                            <input type="checkbox" data-ng-model="data.serialNumberNotApplicable" /> N/A
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="pull-left" data-ng-if="serialNumberCheckingInProgress">
                    <i class="fa fa-circle-o-notch fa-spin fa-lg green"></i> Checking...
                </div>
                <button type="button" class="btn btn-success"
                        data-ng-disabled="!isSerialNumberVerifiedForAllItemsInSerialManager()"
                        data-ng-click="persistSerialManagerInSelectedProduct()">
                    <i class="fa fa-pencil"></i> Save Changes
                </button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>