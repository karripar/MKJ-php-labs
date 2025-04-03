<section id="insert-media-item">
            <form action="upload.php" method="post" enctype="multipart/form-data">
              Select image to upload:
              <div class="form-control">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required />
              </div>
              <div class="form-control">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" required />
              </div>
  
              <div class="form-control">
                <input type="file" name="file" id="file" />
                <input type="submit" value="Upload Image" name="submit" />
              </div>
              <button type="submit">Submit</button>
            </form>
          </section>