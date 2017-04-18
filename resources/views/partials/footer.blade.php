                </div>
            </div>
        </div>
    </div>
    <div class="row columns expanded">
        <div class="large-9 medium-10 medium-centered large-centered columns">
            <div id="SiteFooter">
                <p>Roland Tacadena - tacadena.roland@gmail.com</p>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/vendor/jquery.js')  }}"></script>
    <script src="{{ asset('js/vendor/what-input.js') }}"></script>
    <script src="{{ asset('js/vendor/foundation.js') }}"></script>
    <script src="{{ asset('js/vendor/sweetalert.min.js') }}"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('additional-scripts')

    <!-- swal flash -->
    @include('flash');

</body>
</html>
