<section id="update-media-item">
    <form action="operations/updateData.php" method="post">
        Select image to upload:
        <div class="form-control">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required minlength="3" maxlength="50" />
        </div>
        <div class="form-control">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" maxlength="200" />
        </div>
        <input type="hidden" name="user_id" value="1" />
        <input type="hidden" name="media_id" value="<?php echo $_GET['media_id']; ?>" id="media_id" />
        <button type="submit">Update</button>
    </form>
</section>