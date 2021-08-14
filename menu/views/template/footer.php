

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Navigation -->
            
            <!-- ./ Navigation -->

            <!-- Content body -->
            <div class="content-body">

                <?php $this->loadViewInTemplate($viewName, $viewData); ?>

                <!-- Footer -->
                <footer class="content-footer">
                    <div>© <?=date('Y')?> - <a href="#" target="_blank">Lucas Vieira</a></div>
                    <div>
                        <nav class="nav">
                            <!-- <a href="#" class="nav-link">Licenses</a>
                            <a href="#" class="nav-link">Change Log</a> -->
                            <a href="https://api.whatsapp.com/send?phone=5534988373408&text=Ol%C3%A1%20Preciso%20de%20suporte" target="_blank" class="nav-link">Suporte</a>
                        </nav>
                    </div>
                </footer>
                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->

    <!-- Main scripts -->
    <script src="<?=BASE_URL?>assets/vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="<?=BASE_URL?>assets/js/functions.js"></script>
    <script src="<?=BASE_URL?>assets/js/app.min.js"></script>

    <!-- Javascript -->
    <script src="<?=BASE_URL?>assets/vendors/dataTable/datatables.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/data.js"></script>
    <script src="<?=BASE_URL?>assets/vendors/form-wizard/jquery.steps.min.js"></script>
    <script src="<?=BASE_URL?>assets/vendors/jquery.repeater.min.js"></script>
    <script src="<?=BASE_URL?>assets/js/horarios.js"></script>
    <script src="<?=BASE_URL?>assets/vendors/input-mask/jquery.mask.js"></script>
    <script src="<?=BASE_URL?>assets/js/moments.js"></script>
    <script src="<?=BASE_URL?>assets/js/despesas.js"></script>
    <script src="<?=BASE_URL?>assets/js/receitas.js"></script>
    <script src="<?=BASE_URL?>assets/js/resumido.js"></script>
    <script src="<?=BASE_URL?>assets/js/pedidos.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.repeater').repeater();
        });
    </script>
    <script>
  $('#wizard-example').steps({
    headerTag: 'h3',
    bodyTag: 'section',
    autoFocus: true,
    titleTemplate: '<span class="wizard-index">#index#</span> #title#',
    onStepChanging: function (event, currentIndex, newIndex) {
        if (currentIndex < newIndex) {
            var form = document.getElementById('form1'),
                form2 = document.getElementById('form2');

            if (currentIndex === 0) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                } else {
                    return true;
                }
            } else if (currentIndex === 1) {
                if (form2.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    form2.classList.add('was-validated');
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
});
</script>

    
</body>

<!-- Mirrored from baston.laborasyon.com/demos/default/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2017], Tue, 25 Aug 2020 18:45:49 GMT -->

</html>