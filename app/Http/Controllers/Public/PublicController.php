<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function about()
    {
        $aboutData = [
            'title' => 'Transforming Education Through Smart Scholarship Management',
            'subtitle' => 'Empowering Students, Supporting Families, Streamlining Administration',
            'description' => 'Our innovative scholarship tracking system revolutionizes how municipalities manage educational funding, ensuring every deserving student receives the support they need to succeed.',
            'hero_stats' => [
                ['number' => '500+', 'label' => 'Students Supported'],
                ['number' => '98%', 'label' => 'Application Success Rate'],
                ['number' => '24/7', 'label' => 'System Availability'],
                ['number' => '0', 'label' => 'Paper Applications'],
            ],
            'features' => [
                [
                    'icon' => 'fas fa-rocket',
                    'title' => 'Lightning-Fast Applications',
                    'description' => 'Submit scholarship applications in minutes, not hours. Our streamlined process eliminates paperwork and reduces processing time by 80%.',
                ],
                [
                    'icon' => 'fas fa-shield-alt',
                    'title' => 'Secure & Transparent',
                    'description' => 'Bank-level security with full transparency. Track your application status in real-time and receive instant notifications.',
                ],
                [
                    'icon' => 'fas fa-chart-line',
                    'title' => 'Smart Analytics',
                    'description' => 'Data-driven decisions with comprehensive reporting. Administrators gain insights to optimize scholarship distribution.',
                ],
                [
                    'icon' => 'fas fa-mobile-alt',
                    'title' => 'Mobile-First Design',
                    'description' => 'Apply from anywhere using your smartphone or computer. Our responsive design works perfectly on all devices.',
                ],
                [
                    'icon' => 'fas fa-clock',
                    'title' => 'Automated Processing',
                    'description' => 'AI-powered eligibility checking and automated disbursement scheduling. Reduce administrative workload by 60%.',
                ],
                [
                    'icon' => 'fas fa-users-cog',
                    'title' => 'Multi-User Access',
                    'description' => 'Students, parents, and administrators all have secure access to relevant information and tools.',
                ],
            ],
            'benefits' => [
                'students' => [
                    'title' => 'For Students',
                    'icon' => 'fas fa-user-graduate',
                    'items' => [
                        'Easy online application process',
                        'Real-time application tracking',
                        'Instant eligibility feedback',
                        'Secure document submission',
                        'Mobile access anywhere',
                        'Multiple scholarship opportunities'
                    ]
                ],
                'parents' => [
                    'title' => 'For Parents',
                    'icon' => 'fas fa-home',
                    'items' => [
                        'Monitor your child\'s applications',
                        'Receive important notifications',
                        'Access financial aid history',
                        'Secure family account management',
                        '24/7 support access',
                        'Peace of mind with transparent process'
                    ]
                ],
                'administrators' => [
                    'title' => 'For Administrators',
                    'icon' => 'fas fa-cogs',
                    'items' => [
                        'Automated eligibility verification',
                        'Comprehensive reporting dashboard',
                        'Streamlined approval workflows',
                        'Reduced paperwork by 90%',
                        'Data-driven decision making',
                        'Efficient fund management'
                    ]
                ]
            ],
            'how_it_works' => [
                'title' => 'How Our System Works',
                'steps' => [
                    [
                        'step' => '01',
                        'title' => 'Easy Registration',
                        'description' => 'Students and parents create secure accounts with basic information and verification.'
                    ],
                    [
                        'step' => '02',
                        'title' => 'Smart Application',
                        'description' => 'AI-powered forms adapt to applicant profiles, asking only relevant questions.'
                    ],
                    [
                        'step' => '03',
                        'title' => 'Instant Verification',
                        'description' => 'Automated checks validate eligibility criteria and document authenticity.'
                    ],
                    [
                        'step' => '04',
                        'title' => 'Transparent Review',
                        'description' => 'Administrators review applications with comprehensive dashboards and analytics.'
                    ],
                    [
                        'step' => '05',
                        'title' => 'Automated Disbursement',
                        'description' => 'Approved funds are automatically scheduled and tracked through completion.'
                    ]
                ]
            ],
            'testimonials' => [
                [
                    'quote' => 'This system made applying for scholarships so much easier. I got approved in just 2 weeks!',
                    'author' => 'Maria Santos',
                    'role' => 'College Student',
                    'rating' => 5
                ],
                [
                    'quote' => 'As a parent, I love being able to track my daughter\'s application progress in real-time.',
                    'author' => 'Roberto Cruz',
                    'role' => 'Parent',
                    'rating' => 5
                ],
                [
                    'quote' => 'The administrative efficiency has improved dramatically. We process 3x more applications with the same staff.',
                    'author' => 'Dr. Elena Reyes',
                    'role' => 'Municipal Education Director',
                    'rating' => 5
                ]
            ],
            'call_to_action' => [
                'title' => 'Ready to Start Your Educational Journey?',
                'description' => 'Join hundreds of successful students who have secured their education through our streamlined scholarship system.',
                'primary_button' => [
                    'text' => 'Apply Now',
                    'url' => '/register'
                ],
                'secondary_button' => [
                    'text' => 'Learn More',
                    'url' => '/scholarships'
                ]
            ]
        ];

        return view('public.about', compact('aboutData'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function scholarships()
    {
        return view('public.scholarships');
    }

    public function announcements()
    {
        return view('public.announcements');
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function eligibility()
    {
        return view('public.eligibility');
    }

    public function track()
    {
        $result = null; // Placeholder for tracking logic
        return view('public.track', compact('result'));
    }
}
