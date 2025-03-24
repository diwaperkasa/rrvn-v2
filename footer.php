    <footer>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        document.querySelector('.nav-form-search').addEventListener('click', function (event) {
            document.querySelector('.nav-form-search input').classList.add('active');
            document.querySelector('.nav-form-search input').focus();
        });

        document.querySelector('.nav-form-search input').addEventListener('focusout', function (event) {
            document.querySelector('.nav-form-search input').classList.remove('active');
        });

    </script>
    <?php wp_footer(); ?>
</body>

</html>