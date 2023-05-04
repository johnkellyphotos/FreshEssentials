<footer class="text-center text-lg-start bg-light text-muted">
    <br/>
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Using {$app.html}
                    </h6>
                    <p>
                        {$app.html} is free to use and build as you want. Want to make a contribution to
                        <i>{$app.html}</i>? Check
                        out our <a href="{APP_GIT_REPO}">Git Repo</a>, we are always open to
                        suggestions.
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="/Documentation/">Documentation</a>
                    </p>
                    <p>
                        <a href="">Examples</a>
                    </p>
                    <p>
                        <a href="">Report a bug or submit a fix</a>
                    </p>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">Get in touch?</h6>
                    <p><i class="fas fa-user me-3"></i> <i>{$app.html}</i> is created by John Kelly.</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        Send an <a href>email</a>
                    </p>
                    <p><i class="fas fa-github me-3"></i><a
                                href="https://github.com/johnkellyphotos/">@johnkellyphotos</a></p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © {date('Y')} {$app.html}
    </div>
</footer>