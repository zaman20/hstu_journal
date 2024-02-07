<?php $__env->startSection('content'); ?>
<div class="main-container">
    <?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="author-content-area">
        <div class="left-part">
          <?php echo $__env->make('template.author-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="middle-part full-width">
            <ul class="myprogress-bar">
                <li><a href="" id="p1" class="active">1</a></li>
                <li><a href="" id="p2">2</a></li>
                <li><a href="" id="p3">3</a></li>
                <li><a href="" id="p4">4</a></li>
                <li><a href="" id="p5">5</a></li>
                <li><a href="" id="p6">6</a></li>
                <li><a href="" id="p7">7</a></li>
                <li><a href="" id="p8">8</a></li>
            </ul>
            <div class="form-area border border-primary border-2">
                <form action="/paper-submit" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-box" id="page1">
                    <h2>Article Type Selection</h2>
                    <select name="type" id="" class="form-select">
                        <option value="Full Length Article">Full Length Article</option>
                        <option value="Manuscript">Manuscript</option>
                        <option value="Short Length">Short length</option>
                    </select>
                    <a data-id="1" class="next mt-2 btn btn-secondary">Next</a>
                </div>

                <div class="form-box" class="form-control" id="page2">
                    <h2>Attach Files </h2>
                    <input name="authorfile" type="file">
                    <a data-id="2" class="back btn btn-warning">Back</a>
                    <a data-id="2" class="next btn btn-secondary">Next</a>
                </div>

                <div class="form-box" id="page3">

                    <h2>Classification </h2>

                    <input name="classification" type="checkbox" class="form-check-input" value="Biomedical Statistics">Biomedical Statistics <br>
                    <input name="classification" type="checkbox" class="form-check-input" value="Clinical Trial">Clinical Trials <br>
                    <input name="classification" type="checkbox" class="form-check-input" value="Cognitive Science">Cognitive Science <br>
                    <input name="classification" type="checkbox" class="form-check-input" value="Computional Biology">Computional Bilogy <br>
                    <a data-id="3" class="back btn btn-warning mt-2">Back</a>
                    <a data-id="3" class="next btn btn-secondary mt-2">Next</a>
                </div>

                <div class="form-box" id="page4">

                    <h2>Review Preferences</h2>
                    <input name="reviewers" type="text" class="form-control" placeholder="Suggested Reviewers">
                    <a data-id="4" class="back btn btn-warning mt-2">Back</a>
                    <a data-id="4" class="next btn btn-secondary mt-2">Next</a>
                </div>

                <div class="form-box" id="page5">

                    <h2>Review Preferences</h2>
                    <label for="">If English is not your first language,has your paper been edited by a native English
                        Speaker?</label>
                    <br>
                    <input name="language" value="Yes" type="radio" class="form-check-input">Yes <br>
                    <input name="language" value="No" type="radio" class="form-check-input">No <br>
                    <input name="language" value="Not Applicable" type="radio" class="form-check-input">Not Applicable <br>
                    <a data-id="5" class="back btn btn-warning mt-2">Back</a>
                    <a data-id="5" class="next btn btn-secondary mt-2">Next</a>
                </div>

                <div class="form-box" id="page6">

                    <h2>Comments</h2>
                    <label for="">Enter Comments</label>
                    <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
                    <a data-id="6" class="back btn btn-warning mt-2">Back</a>
                    <a data-id="6" class="next btn btn-secondary mt-2">Next</a>
                </div>

                <div class="form-box" id="page7">

                    <h2>Manuscript Data</h2>
                    <input name="title" type="text" class="form-control" placeholder="Title"> <br>
                    <input name="abstract" type="text" class="form-control" placeholder="Abstract"> <br>
                    <input name="keyword" type="text" class="form-control" placeholder="Keyword">
                    
                    <button  class="paper-submit btn btn-secondary mt-2">Submit</button>
                </div>
                </form>

            </div>


        </div>

    </div>

</div>

<?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hstu_journal\resources\views/author-submit.blade.php ENDPATH**/ ?>