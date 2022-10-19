<div wire:ignore.self id="updateModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="text" id="exampleFormControlInput1" class="form-control"  placeholder="Enter Title" wire:model="title" />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Subtitle</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Subtitle" wire:model="subtitle" />
                        @error('subtitle')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Discount</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Discount" wire:model="discount" />
                        @error('discount')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Often Used</label>
                        <input type="text" id="exampleFormControlInput2" class="form-control" placeholder="Enter Often Used" wire:model="often_used" />
                        @error('often_used')<span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>