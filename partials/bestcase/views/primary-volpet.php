<div id="app-content-primary">
  <div class="panel panel-montane">
    <div class="panel-heading">
      <div class="panel-heading-content">
        <div class="heading-content-left">
          <button type="button" class="btn btn-primary btn-xs offcanvas-toggle" data-toggle="offcanvas">Toggle nav</button>
          <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li class="active" role="presentation"><a id="tab-1-tab" role="tab" href="#tab-1" data-toggle="tab" aria-controls="tab-1" aria-expanded="true">Debtor 1</a></li>
            <li role="presentation"><a id="tab-2-tab" role="tab" href="#tab-2" data-toggle="tab" aria-controls="tab-2" aria-expanded="true">Debtor 2</a></li>
            <li role="presentation"><a id="tab-3-tab" role="tab" href="#tab-3" data-toggle="tab" aria-controls="tab-3" aria-expanded="true">Filing Information</a></li>
            <li role="presentation"><a id="tab-4-tab" role="tab" href="#tab-4" data-toggle="tab" aria-controls="tab-4" aria-expanded="true">Credit Counseling</a></li>
            <li role="presentation"><a id="tab-5-tab" role="tab" href="#tab-5" data-toggle="tab" aria-controls="tab-5" aria-expanded="true">Additional Information</a></li>
            <li role="presentation"><a id="tab-6-tab" role="tab" href="#tab-6" data-toggle="tab" aria-controls="tab-6" aria-expanded="true">Prior/Related</a></li>
            <li role="presentation"><a id="tab-7-tab" role="tab" href="#tab-7" data-toggle="tab" aria-controls="tab-7" aria-expanded="true">Statistical/Admin</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="panel-body">
      <div id="myTabContent" class="tab-content">

        <div id="tab-1" class="tab-pane fade in active" role="tabpanel" aria-labelledby="tab-1-tab">
          <form>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="debtor1Fname">First Name</label>
                  <input type="text" class="form-control" id="debtor1FName" placeholder="">
                </div>
                <div class="col-md-2">
                  <label for="debtor1Mname">Middle Name</label>
                  <input type="text" class="form-control" id="debtor1MName" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="debtor1Lname">Last Name</label>
                  <input type="text" class="form-control" id="debtor1LName" placeholder="">
                </div>
                <div class="col-md-2">
                  <label for="debtor1suffix">Suffix</label>
                  <select id="debtor1suffix" class="form-control">
                    <option></option>
                    <option>Jr.</option>
                    <option>Sr.</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                    <option>V</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                  </select>
                </div>
              </div>
            </div> <!-- /first form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="ElectronicSignature">Electronic Signature</label>
                  <input type="text" class="form-control" id="ElectronicSignature" placeholder="" />
                  <div>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Debtor" /> Debtor
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Spouse" /> Spouse (POA)
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Attorney" /> Attorney (POA)
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="debtor1otherNames">Other Names</label><br />
                  <button id="debtor1otherNames" class="btn btn-tertiary btn-sm">Add</button>
                </div>
              </div>
            </div> <!-- /second form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="indexAs">Index As</label>
                  <input type="text" class="form-control" id="indexAs" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="officeFileNo">Office File Number</label>
                  <input type="text" class="form-control" id="officeFileNo" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="debtor1ssn">Social Security Number</label>
                  <input type="text" class="form-control" id="debtor1Ssn" placeholder="">
                </div>
              </div>
            </div> <!-- /third form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="debtor1streetAddress">Street Address</label>
                      <input type="text" class="form-control" id="debtor1streetAddress" placeholder="">
                    </div>
                    <div class="col-md-5">
                      <label for="debtor1city">City</label>
                      <input type="text" class="form-control" id="debtor1city" placeholder="">
                    </div>
                    <div class="col-md-3">
                      <label for="debtor1state">State</label>
                      <select id="debtor1state" class="form-control">
                        <option></option>
                        <option>AK</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="debtor1zip">Zip Code</label>
                      <input type="text" class="form-control" id="debtor1zip" placeholder="">
                    </div>
                    <div class="col-md-12">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="debtor1DifferentMailingAddress" value="Different Mailing Address" /> Different Mailing Address
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label for="debtor1county">County</label>
                      <input type="text" class="form-control" id="debtor1county" placeholder="">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="debtor1ShowCountiesZipCodeOnly" value="Show counties for zip code only" /> Show counties for zip code only
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- /fourth form group -->

          </form>
          <form>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="debtor1Fname">First Name</label>
                  <input type="text" class="form-control" id="debtor1FName" placeholder="">
                </div>
                <div class="col-md-2">
                  <label for="debtor1Mname">Middle Name</label>
                  <input type="text" class="form-control" id="debtor1MName" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="debtor1Lname">Last Name</label>
                  <input type="text" class="form-control" id="debtor1LName" placeholder="">
                </div>
                <div class="col-md-2">
                  <label for="debtor1suffix">Suffix</label>
                  <select id="debtor1suffix" class="form-control">
                    <option></option>
                    <option>Jr.</option>
                    <option>Sr.</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                    <option>V</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                  </select>
                </div>
              </div>
            </div> <!-- /first form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="ElectronicSignature">Electronic Signature</label>
                  <input type="text" class="form-control" id="ElectronicSignature" placeholder="" />
                  <div>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Debtor" /> Debtor
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Spouse" /> Spouse (POA)
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="ElectronicSignature" value="Attorney" /> Attorney (POA)
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="debtor1otherNames">Other Names</label><br />
                  <button id="debtor1otherNames" class="btn btn-tertiary btn-sm">Add</button>
                </div>
              </div>
            </div> <!-- /second form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="indexAs">Index As</label>
                  <input type="text" class="form-control" id="indexAs" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="officeFileNo">Office File Number</label>
                  <input type="text" class="form-control" id="officeFileNo" placeholder="">
                </div>
                <div class="col-md-4">
                  <label for="debtor1ssn">Social Security Number</label>
                  <input type="text" class="form-control" id="debtor1Ssn" placeholder="">
                </div>
              </div>
            </div> <!-- /third form group -->

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <label for="debtor1streetAddress">Street Address</label>
                      <input type="text" class="form-control" id="debtor1streetAddress" placeholder="">
                    </div>
                    <div class="col-md-5">
                      <label for="debtor1city">City</label>
                      <input type="text" class="form-control" id="debtor1city" placeholder="">
                    </div>
                    <div class="col-md-3">
                      <label for="debtor1state">State</label>
                      <select id="debtor1state" class="form-control">
                        <option></option>
                        <option>AK</option>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label for="debtor1zip">Zip Code</label>
                      <input type="text" class="form-control" id="debtor1zip" placeholder="">
                    </div>
                    <div class="col-md-12">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="debtor1DifferentMailingAddress" value="Different Mailing Address" /> Different Mailing Address
                      </label>
                    </div>
                    <div class="col-md-12">
                      <label for="debtor1county">County</label>
                      <input type="text" class="form-control" id="debtor1county" placeholder="">
                      <label class="checkbox-inline">
                        <input type="checkbox" name="debtor1ShowCountiesZipCodeOnly" value="Show counties for zip code only" /> Show counties for zip code only
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- /fourth form group -->

          </form>
        </div>
        <div id="tab-2" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-2-tab">
          <form>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="debtor1Fname">First Name</label>
                  <input type="text" class="form-control" id="debtor1FName" placeholder="">
                </div>
                <div class="form-group">
                  <label for="debtor1Mname">Middle Name</label>
                  <input type="text" class="form-control" id="debtor1MName" placeholder="">
                </div>
                <div class="form-group">
                  <label for="debtor1Lname">Last Name</label>
                  <input type="text" class="form-control" id="debtor1LName" placeholder="">
                </div>
                <div class="form-group">
                  <label for="debtor1suffix">Suffix</label>
                  <select id="debtor1suffix" class="form-control">
                    <option></option>
                    <option>Jr.</option>
                    <option>Sr.</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                    <option>V</option>
                    <option>2nd</option>
                    <option>3rd</option>
                    <option>4th</option>
                    <option>5th</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="debtor1otherNames">Other Names</label><br />
                  <button id="debtor1otherNames" class="btn btn-tertiary btn-sm">Add</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="debtor1ssn">Social Security Number</label>
                  <input type="text" class="form-control" id="debtor1Ssn" placeholder="">
                </div>
                <div class="form-group">
                  <label for="indexAs">Index As</label>
                  <input type="text" class="form-control" id="indexAs" placeholder="">
                </div>
                <div class="form-group">
<label for="ElectronicSignatureType">Electronic Signature Type</label>
                  <select id="debtorSignatureType" class="form-control">
                    <option>Debtor</option>
                    <option>Spouse (POA)</option>
                    <option>Attorney (POA)</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ElectronicSignature">Electronic Signature</label>
                  <input type="text" class="form-control" id="ElectronicSignature" placeholder="" />
                </div>
                <div class="form-group">
                  <label for="officeFileNo">Office File Number</label>
                  <input type="text" class="form-control" id="officeFileNo" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                    <label for="debtor1streetAddress">Street Address</label>
                    <input type="text" class="form-control" id="debtor1streetAddress" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="debtor1city">City</label>
                    <input type="text" class="form-control" id="debtor1city" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="debtor1state">State</label>
                    <select id="debtor1state" class="form-control">
                      <option></option>
                      <option>AK</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="debtor1zip">Zip Code</label>
                    <input type="text" class="form-control" id="debtor1zip" placeholder="">
                    <label class="checkbox-inline">
                      <input type="checkbox" name="debtor1DifferentMailingAddress" value="Different Mailing Address" /> Different Mailing Address
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="debtor1county">County</label>
                    <select id="debtor1county" class="form-control">
                      <option>Aleutians East</option>
                      <option>Aleutians East</option>
                      <option>Anchorage</option>
                    </select>
                    <label class="checkbox-inline">
                      <input type="checkbox" name="debtor1ShowCountiesZipCodeOnly" value="Show counties for zip code only" /> Show counties for zip code only
                    </label>
                  </div>
              </div>
            </div>
          </form>
        </div>
        <div id="tab-3" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-3-tab">

          Tab three content pane

        </div>
        <div id="tab-4" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-4-tab">

          Tab four content pane

        </div>
        <div id="tab-5" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-5-tab">

          Tab five content pane

        </div>
        <div id="tab-6" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-6-tab">

          Tab six content pane

        </div>
        <div id="tab-7" class="tab-pane fade" role="tabpanel" aria-labelledby="tab-7-tab">

          Tab seven content pane

        </div>
      </div>
    </div>
    <div class="panel-footer">
      <div class="panel-footer-content">
        <div class="footer-content-left">
        </div>
        <div class="footer-content-right">
          <button id="previous-tab" class="btn btn-secondary disabled">Previous</button>
          <button id="next-tab" class="btn btn-secondary">Next</button>
          <button id="save-tabset" class="btn btn-primary">Save</button>
          <button id="cancel-tabset" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>
