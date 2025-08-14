<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Enfield - Client Finder Platform</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .brand-color{
            color: #005AA8;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }
    </style>
</head>

<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-gray-800 hidden">Tech Enfield</h1>
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-24 h-auto mt-1">
                        <p class="text-sm text-gray-600 hidden">Client Finder Platform</p>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        {{-- <a href="#services" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Services</a> --}}
                        <a href="#how-it-works"
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">How
                            It Works</a>
                        <a href="#commission"
                            class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Commission</a>
                        <a href="{{ route('register') }}"
                            class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition duration-300">Get
                            Started</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Connect Clients with
                <span class="text-yellow-300">Tech Excellence</span>
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto leading-relaxed">
                Join our exclusive network and earn <strong class="text-yellow-300">10% commission</strong> for every
                successful client referral to Tech Enfield's premium IT services.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}"
                    class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-lg text-lg font-semibold hover:bg-yellow-300 transition duration-300 shadow-lg transform hover:scale-105">
                    Start Finding Clients
                </a>
                <a href="#services"
                    class="border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-gray-900 transition duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    {{-- <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Premium IT Services</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Tech Enfield delivers cutting-edge solutions that drive business growth and digital transformation.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Web & App Development -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-blue-500">
                    <div class="text-blue-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Web & App Development</h3>
                    <p class="text-gray-600 mb-4">Custom websites, web applications, and mobile apps built with modern technologies and best practices.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• Responsive Web Design</li>
                        <li>• E-commerce Solutions</li>
                        <li>• Mobile App Development</li>
                        <li>• Progressive Web Apps</li>
                    </ul>
                </div>

                <!-- Social Media Design & Management -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-pink-500">
                    <div class="text-pink-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2M7 4h10M7 4l-2 16h14l-2-16"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Social Media Management</h3>
                    <p class="text-gray-600 mb-4">Professional social media design, content creation, and strategic management across all platforms.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• Content Strategy & Creation</li>
                        <li>• Visual Design & Branding</li>
                        <li>• Community Management</li>
                        <li>• Social Media Analytics</li>
                    </ul>
                </div>

                <!-- SEO Services -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-green-500">
                    <div class="text-green-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">SEO Optimization</h3>
                    <p class="text-gray-600 mb-4">Comprehensive SEO strategies to improve search rankings and drive organic traffic growth.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• Technical SEO Audits</li>
                        <li>• Keyword Research & Strategy</li>
                        <li>• Content Optimization</li>
                        <li>• Local SEO Services</li>
                    </ul>
                </div>

                <!-- IT Consulting -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-purple-500">
                    <div class="text-purple-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">IT Consulting</h3>
                    <p class="text-gray-600 mb-4">Strategic technology consulting to help businesses optimize their IT infrastructure and processes.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• Digital Transformation</li>
                        <li>• Technology Strategy</li>
                        <li>• System Integration</li>
                        <li>• Cloud Solutions</li>
                    </ul>
                </div>

                <!-- Digital Marketing -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-red-500">
                    <div class="text-red-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z M11 3.055A9.001 9.001 0 113.055 13H11V3.055z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Comprehensive digital marketing strategies to boost online presence and drive conversions.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• PPC Advertising</li>
                        <li>• Email Marketing</li>
                        <li>• Content Marketing</li>
                        <li>• Analytics & Reporting</li>
                    </ul>
                </div>

                <!-- Custom Solutions -->
                <div class="bg-white rounded-xl shadow-lg p-8 card-hover border-t-4 border-indigo-500">
                    <div class="text-indigo-500 mb-4">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Custom Solutions</h3>
                    <p class="text-gray-600 mb-4">Tailored IT solutions designed to meet specific business requirements and challenges.</p>
                    <ul class="text-sm text-gray-500 space-y-1">
                        <li>• Custom Software Development</li>
                        <li>• API Development</li>
                        <li>• Database Solutions</li>
                        <li>• Integration Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                <p class="text-xl text-gray-600">Simple steps to start earning commissions</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-blue-600">1</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Find Clients</h3>
                    <p class="text-gray-600">Identify businesses that need IT services. Use your network, cold outreach,
                        or referral partnerships.</p>
                </div>

                <div class="text-center">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-green-600">2</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Make Connection</h3>
                    <p class="text-gray-600">Connect the client with Tech Enfield. We handle the consultation, proposal,
                        and project execution.</p>
                </div>

                <div class="text-center">
                    <div class="bg-yellow-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                        <span class="text-3xl font-bold text-yellow-600">3</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Earn Commission</h3>
                    <p class="text-gray-600">Receive 10% commission on the total project value once the client signs and
                        the project is completed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Commission Section -->
    <section id="commission" class="py-20 bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-8">Earn Generous Commissions</h2>
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-blue-800 rounded-lg p-8">
                    <div class="text-4xl font-bold text-yellow-300 mb-2 pulse-animation">10%</div>
                    <h3 class="text-xl font-semibold mb-2">Commission Rate</h3>
                    <p class="text-blue-200">On every successful deal closure</p>
                </div>

                <div class="bg-blue-800 rounded-lg p-8">
                    <div class="text-4xl font-bold text-yellow-300 mb-2">Rs. 5000+</div>
                    <h3 class="text-xl font-semibold mb-2">Average Project Value</h3>
                    <p class="text-blue-200">Most projects range from Rs. 5,000 to Rs. 50,000+</p>
                </div>

                <div class="bg-blue-800 rounded-lg p-8">
                    <div class="text-4xl font-bold text-yellow-300 mb-2">30</div>
                    <h3 class="text-xl font-semibold mb-2">Days Payment</h3>
                    <p class="text-blue-200">Fast commission payments after project completion</p>
                </div>
            </div>

            <div class="bg-green-600 inline-block px-8 py-4 rounded-lg">
                <p class="text-2xl font-bold">Potential Earnings: Rs. 500 - Rs. 5,000+ per referral!</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-20 gradient-bg text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Start Earning?</h2>
            <p class="text-xl mb-8">Join our partner network today and start connecting businesses with premium IT
                solutions.</p>

            <div class="bg-white rounded-lg p-8 shadow-2xl">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Create Your Partner Account</h3>
                <p class="text-gray-600 mb-8">Sign up now to access our client finder platform and start earning
                    commissions on successful referrals.</p>

                <div class="space-y-6">
                    <a href="{{ route('register') }}"
                        class="block w-full bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-105 shadow-lg">
                        Create Partner Account
                    </a>

                    <div class="text-center">
                        <p class="text-gray-600">Already have an account?
                            <a href="{{ route('login') }}"
                                class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Sign
                                In</a>
                        </p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">What you get as a partner:</h4>
                    <div class="grid md:grid-cols-2 gap-4 text-left">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Access to client management dashboard</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Real-time commission tracking</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Marketing materials & resources</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Dedicated partner support</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-6 text-center">
                <div>
                    <h4 class="font-semibold mb-2">Email Support</h4>
                    <p><a href="mailto:info@techenfield.com">info@techenfield.com</a></p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Call Us</h4>
                    <p><a href="tel:+977 976-5020882">+977 976-5020882</a></p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Quick Onboarding</h4>
                    <p>Get started in under 5 minutes</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Tech Enfield</h3>
                    <p class="text-gray-400 mb-4">Your trusted partner for comprehensive IT solutions. We help
                        businesses grow through technology, and we help partners earn through our referral program.</p>
                    <div class="flex justify-center space-x-4">
                        <a href="https://linkedin.com/company/tech-enfield"
                            class="text-gray-400 hover:text-white transition duration-300"
                            target="_blank">LinkedIn</a>
                        <a href="https://instagram.com/tech.enfield"
                            class="text-gray-400 hover:text-white transition duration-300"
                            target="_blank">Instagram</a>
                        <a href="https://www.facebook.com/profile.php?id=61564425882690"
                            class="text-gray-400 hover:text-white transition duration-300"
                            target="_blank">Facebook</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} <a href="https://techenfield.com" target="__blank">Tech Enfield</a>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
