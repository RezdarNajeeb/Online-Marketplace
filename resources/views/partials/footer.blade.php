<footer class="bg-white/80 backdrop-blur-lg dark:bg-gray-800/80 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="space-y-6">
                <!-- Logo Section -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-store text-2xl text-indigo-600"></i>
                    <span class="text-xl font-bold text-gray-900 dark:text-white">{{ config('app.name', 'Laravel') }}</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Your trusted marketplace for quality products. We connect buyers and sellers to create a seamless shopping experience.
                </p>
                <!-- Social Links -->
                <div class="flex space-x-5">
                    <a href="#" class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300">
                        <i class="fab fa-twitter text-xl hover:scale-110 transition-transform duration-300"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300">
                        <i class="fab fa-facebook text-xl hover:scale-110 transition-transform duration-300"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300">
                        <i class="fab fa-instagram text-xl hover:scale-110 transition-transform duration-300"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300">
                        <i class="fab fa-linkedin text-xl hover:scale-110 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="space-y-6">
                <h3 class="text-gray-900 dark:text-white font-semibold text-lg">Quick Links</h3>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('products.index') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-chevron-right text-sm mr-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                            <span>All Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/orders') }}"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-chevron-right text-sm mr-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                            <span>Track Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-chevron-right text-sm mr-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                            <span>New Arrivals</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-chevron-right text-sm mr-2 transition-transform duration-300 group-hover:translate-x-1"></i>
                            <span>Special Offers</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div class="space-y-6">
                <h3 class="text-gray-900 dark:text-white font-semibold text-lg">Customer Service</h3>
                <ul class="space-y-4">
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-question-circle text-sm mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            <span>Help Center</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-truck text-sm mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            <span>Shipping Info</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-undo text-sm mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            <span>Returns</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-shield-alt text-sm mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            <span>Privacy Policy</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Newsletter & Contact -->
            <div class="space-y-6">
                <h3 class="text-gray-900 dark:text-white font-semibold text-lg">Stay Updated</h3>
                <div class="space-y-4">
                    <!-- Newsletter Form -->
                    <form class="space-y-3">
                        <div class="relative">
                            <input type="email"
                                   placeholder="Your email address"
                                   class="w-full px-4 py-2 rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                        </div>
                        <button type="submit"
                                class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 text-white rounded-lg transition-colors duration-300 flex items-center justify-center space-x-2">
                            <i class="fas fa-paper-plane"></i>
                            <span>Subscribe</span>
                        </button>
                    </form>

                    <!-- Contact Info -->
                    <div class="space-y-3">
                        <a href="tel:+15551234567"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-phone mr-2 transition-transform duration-300 group-hover:rotate-12"></i>
                            <span>+1 (555) 123-4567</span>
                        </a>
                        <a href="mailto:contact@example.com"
                           class="text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center group transition-colors duration-300">
                            <i class="fas fa-envelope mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            <span>contact@example.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <!-- Copyright -->
                <div class="text-gray-600 dark:text-gray-400 flex items-center space-x-1">
                    <i class="far fa-copyright"></i>
                    <span>{{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</span>
                </div>

                <!-- Payment Methods -->
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 dark:text-gray-400 text-sm">Payment Methods:</span>
                    <div class="flex space-x-3">
                        <i class="fab fa-cc-visa text-gray-600 dark:text-gray-400 text-2xl hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300"></i>
                        <i class="fab fa-cc-mastercard text-gray-600 dark:text-gray-400 text-2xl hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300"></i>
                        <i class="fab fa-cc-paypal text-gray-600 dark:text-gray-400 text-2xl hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300"></i>
                        <i class="fab fa-cc-apple-pay text-gray-600 dark:text-gray-400 text-2xl hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
