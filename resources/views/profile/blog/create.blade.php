
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un article</h4>
            </div>
            <form action="{{ url('/profile/'.$user->id.'/blog/store') }}" method="POST">
                {{ csrf_field() }}
            <div class="modal-body">
                    <div class="form-group">
                        <label for="titre">Titre:</label><input  name="titre" id="titre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu: </label>
                        <textarea id="content" name="content" class="form-control"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
            </form>
        </div>
    </div>
</div>