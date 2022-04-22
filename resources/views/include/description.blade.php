<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="descriptionLabel" aria-hidden="true" id="descriptionLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <p id="description-modal-title" class="h3 text-primary"></p>
      </div>
      <div class="modal-body">
        <div class="d-none" id="keep">
          @include('services.keep')
        </div>
        <div class="d-none" id="feat">
          @include('services.feat')
        </div>
        <div class="d-none" id="groom">
          @include('services.groom')
        </div>
        <div class="d-none" id="training">
          @include('services.training')
        </div>
        <div class="d-none" id="gym">
          @include('services.gym')
        </div>
        <div class="d-none" id="salon">
          @include('services.salon')
        </div>
      </div>
    </div>
  </div>
</div>