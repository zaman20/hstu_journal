
<?php $__env->startSection('content'); ?>
<div class="main-container">
    <?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="author-content-area">
        <div class="left-part">
            <h3>New Submission</h3>
            <ul>
                <li><a href="">Submit New Manuscript</a></li>
                <li><a href="">Submissions Sent Back to Author (0)</a></li>
                <li><a href="">Incomplete Submissions (1)</a></li>
                <li><a href="">Submissions Waiting for Author's Approval (0)</a></li>
                <li><a href="">Submissions Being Processed (0)</a></li>
                <li><a href="">Author Main Page</a></li>
            </ul>
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
                <div class="form-box" id="page1">
                    <h2>Article Type Selection</h2>
                    <select name="" id="" class="form-select">
                        <option value="">Full Length Article</option>
                        <option value="">Manuscript</option>
                        <option value="">Short length</option>
                    </select>
                    <button data-id="1" class="next mt-2 btn btn-secondary">Next</button>
                </div>

                <div class="form-box" class="form-control" id="page2">
                    <h2>Attach Files </h2>
                    <input type="file">
                    <button data-id="2" class="back btn btn-warning">Back</button>
                    <button data-id="2" class="next btn btn-secondary">Next</button>
                </div>

                <div class="form-box" id="page3">

                    <h2>Classification </h2>

                    <input type="checkbox" class="form-check-input">Biomedical Statistics <br>
                    <input type="checkbox" class="form-check-input">Clinical Trials <br>
                    <input type="checkbox" class="form-check-input">Cognitive Science <br>
                    <input type="checkbox" class="form-check-input">Computional Bilogy <br>
                    <button data-id="3" class="back btn btn-warning mt-2">Back</button>
                    <button data-id="3" class="next btn btn-secondary mt-2">Next</button>
                </div>

                <div class="form-box" id="page4">

                    <h2>Review Preferences</h2>
                    <input type="text" class="form-control" placeholder="Suggested Reviewers">
                    <button data-id="4" class="back btn btn-warning mt-2">Back</button>
                    <button data-id="4" class="next btn btn-secondary mt-2">Next</button>
                </div>

                <div class="form-box" id="page5">

                    <h2>Review Preferences</h2>
                    <label for="">If English is not your first language,has your paper been edited by a native English
                        Speaker?</label>
                    <br><input type="radio" class="form-check-input">Yes <br>
                    <input type="radio" class="form-check-input">No <br>
                    <input type="radio" class="form-check-input">Not Applicable <br>
                    <button data-id="5" class="back btn btn-warning mt-2">Back</button>
                    <button data-id="5" class="next btn btn-secondary mt-2">Next</button>
                </div>

                <div class="form-box" id="page6">

                    <h2>Comments</h2>
                    <label for="">Enter Comments</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                    <button data-id="6" class="back btn btn-warning mt-2">Back</button>
                    <button data-id="6" class="next btn btn-secondary mt-2">Next</button>
                </div>

                <div class="form-box" id="page7">

                    <h2>Manuscript Data</h2>
                    <input type="text" class="form-control" placeholder="Title"> <br>
                    <input type="text" class="form-control" placeholder="Abstract"> <br>
                    <input type="text" class="form-control" placeholder="Keyword">
                    <button data-id="7" class="back btn btn-warning mt-2">Back</button>
                    <button data-id="7" class="next btn btn-secondary mt-2">Next</button>
                </div>


            </div>


        </div>

    </div>

</div>

<?php echo $__env->make('template.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hstu_journal\resources\views/author-submit.blade.php ENDPATH**/ ?>