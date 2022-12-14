@extends('master')
@section('mainContent')
<div class="container-fluid flex-grow-1 container-p-y">

  <h4 class="font-weight-bold py-3 mb-4">
    <span class="text-muted font-weight-light">Forms /</span> jQuery Validation
  </h4>

  <div class="card mb-4">
    <div class="card-body">
      <form id="validation-form">
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="validation-email" placeholder="Email">
          <small class="form-text text-muted">Example block-level help text here.</small>
        </div>
        <div class="form-group">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="validation-password" placeholder="Password">
          <small class="form-text text-muted">Example block-level help text here.</small>
        </div>
        <div class="form-group">
          <label class="form-label">Confirm password</label>
          <input type="password" class="form-control" name="validation-password-confirmation" placeholder="Confirm password">
        </div>
        <div class="form-group">
          <label class="form-label">Required</label>
          <input type="text" class="form-control" name="validation-required" placeholder="Required">
        </div>
        <div class="form-group">
          <label class="form-label">URL</label>
          <input type="text" class="form-control" name="validation-url" placeholder="Url">
        </div>
        <div class="form-group">
          <label class="form-label">Phone</label>
          <input type="text" class="form-control" name="validation-phone" placeholder="Phone: (999) 999-9999">
        </div>
        <div class="form-group">
          <label class="form-label">Select</label>
          <select class="form-control" name="validation-select">
            <option value>Select gear...</option>
            <optgroup label="Climbing">
              <option value="pitons">Pitons</option>
              <option value="cams">Cams</option>
              <option value="nuts">Nuts</option>
              <option value="bolts">Bolts</option>
              <option value="stoppers">Stoppers</option>
              <option value="sling">Sling</option>
            </optgroup>
            <optgroup label="Skiing">
              <option value="skis">Skis</option>
              <option value="skins">Skins</option>
              <option value="poles">Poles</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Multiselect</label>
          <select class="form-control" name="validation-multiselect" multiple>
            <optgroup label="Climbing">
              <option value="pitons">Pitons</option>
              <option value="cams">Cams</option>
              <option value="nuts">Nuts</option>
              <option value="bolts">Bolts</option>
              <option value="stoppers">Stoppers</option>
              <option value="sling">Sling</option>
            </optgroup>
            <optgroup label="Skiing">
              <option value="skis">Skis</option>
              <option value="skins">Skins</option>
              <option value="poles">Poles</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Select2</label>
          <div>
            <select class="form-control" name="validation-select2" style="width: 100%">
              <option></option>
              <option value="ANGULAR">AngularJS</option>
              <option value="REACT">React</option>
              <option value="BACKBONE">Backbone</option>
              <option value="EMBER">Ember</option>
              <option value="TODOMVC">TodoMVC</option>
              <option value="POLYMER">Polymer</option>
              <option value="KNOCKOUT">Knockout</option>
              <option value="AURELIA">Aurelia</option>
              <option value="SPINE">Spine</option>
              <option value="BRICK">Brick</option>
              <option value="NUCLEAR">Nuclear.js</option>
              <option value="DOJO">Dojo</option>
              <option value="MATRESHKA">Matreshka</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Select2 Multiple</label>
          <div>
            <select class="form-control" name="validation-select2-multi" multiple style="width: 100%">
              <optgroup label="Climbing">
                <option value="pitons">Pitons</option>
                <option value="cams">Cams</option>
                <option value="nuts">Nuts</option>
                <option value="bolts">Bolts</option>
                <option value="stoppers">Stoppers</option>
                <option value="sling">Sling</option>
              </optgroup>
              <optgroup label="Skiing">
                <option value="skis">Skis</option>
                <option value="skins">Skins</option>
                <option value="poles">Poles</option>
              </optgroup>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Bootstrap Tagsinput</label>
          <div>
            <input type="text" value data-role="tagsinput" class="form-control" name="validation-bs-tagsinput">
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Text</label>
          <textarea class="form-control" name="validation-text"></textarea>
        </div>
        <div class="form-group">
          <label class="form-label">File</label>
          <div>
            <input type="file" class="validation-file" name="validation-file">
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Switcher</label>
          <br>
          <label class="switcher switcher-primary d-block">
            <input type="checkbox" class="switcher-input" name="validation-switcher">
            <span class="switcher-indicator">
              <span class="switcher-yes"></span>
              <span class="switcher-no"></span>
            </span>
            <span class="switcher-label">Check me</span>
          </label>
        </div>
        <div class="form-group">
          <label class="form-label">Radios</label>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="validation-radios"> Option one is this and that???be sure to include why it's great
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="validation-radios"> Option two can be something else and selecting it will deselect option one
            </label>
          </div>
          <div class="form-check disabled">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="validation-radios"> Option three is disabled
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Custom radios</label>
          <div class="custom-controls-stacked">
            <label class="custom-control custom-radio">
              <input name="validation-radios-custom" type="radio" class="custom-control-input">
              <span class="custom-control-label">Option one is this and that???be sure to include why it's great</span>
            </label>
            <label class="custom-control custom-radio">
              <input name="validation-radios-custom" type="radio" class="custom-control-input">
              <span class="custom-control-label">Option two can be something else and selecting it will deselect option one</span>
            </label>
            <label class="custom-control custom-radio">
              <input name="validation-radios-custom" type="radio" class="custom-control-input">
              <span class="custom-control-label">Option three is disabled</span>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Checkbox</label>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="validation-checkbox"> Check me out
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Checkbox group</label>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="validation-checkbox-group-1"> One
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" name="validation-checkbox-group-2"> Two
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label">Custom checkbox</label>
          <br>
          <label class="custom-control custom-checkbox d-block">
            <input type="checkbox" class="custom-control-input" name="validation-checkbox-custom">
            <span class="custom-control-label">Check me</span>
          </label>
        </div>
        <div class="form-group">
          <label class="form-label">Custom checkbox group</label>
          <div class="custom-controls-stacked">
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="validation-checkbox-custom-group-1">
              <span class="custom-control-label">One</span>
            </label>
            <label class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" name="validation-checkbox-custom-group-2">
              <span class="custom-control-label">Two</span>
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>
@endsection