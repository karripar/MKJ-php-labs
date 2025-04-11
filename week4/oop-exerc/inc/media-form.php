<section id="insert-media-item">
            <form action="operations/insertData.php" method="post" enctype="multipart/form-data">
              Select image to upload:
              <div class="form-control">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required minlength="3" maxlength="50"/>
              </div>
              <div class="form-control">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" maxlength="200"/>
              </div>
  
              <div class="form-control">
                <input type="file" name="file" id="file" />
              </div>
              <button type="submit">Upload</button>
            </form>
          </section>