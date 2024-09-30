<?php
return [
    'header' => [
        'cart' => 'Shopping cart',
        'exit' => 'Exit'
    ],
    'navbar' => [
        'main' => 'Main',
        'myTickets' => 'My tickets',
        'search' => 'Search',
        'help' => 'Help',
        'profile' => 'Profile',
    ],
    'footer' => [
        'slogan' => 'Your trusted partner in travel planning for all modes of transportation.',
        'navigationTitle' => 'Navigation',
        'copyright' => '© 2024 NTicket. All rights reserved.'
    ],
    'mainPage' => [
        'pageTitle' => 'Main Page',
        'banner' => [
            'title' => 'Welcome to the Nticket',
            'text' => 'Nticket is a unique ticket booking platform for all modes of public transportation including cabs, trains and planes. We offer an innovative approach to travel, allowing our customers to buy hybrid tickets for full-fledged itineraries. Our mission: to simplify the travel planning process by making it as comfortable and efficient as possible. With Nticket, you can forget about the need to fart separate tickets for different modes of transportation. Our service allows you to combine your entire itinerary into one ticket, from leaving home to arriving at your destination.'
        ],
        'guide' => [
            'title' => 'How to book',
            'text' => "Booking your tickets has never been easier! Here's a step-by-step guide to help you book your next flight",
            'points' => [
                'search' => [
                    'title' => 'Selection for search',
                    'text' => 'Use our search bar to enter your desired destination and travel dates'
                ],
                'booking' => [
                    'title' => 'Select a destination',
                    'text' => "Once you've found the flight you want, select it and proceed with your booking"
                ],
                'payment' => [
                    'title' => "It's easy to book",
                    'text' => 'Once your payment is confirmed, you will receive an e-ticket via email'
                ]
            ]
        ],
        'advantage' => [
            'title' => 'Our advantage',
            'points' => [
                'hybrid' => [
                    'title' => 'Hybrid tickets',
                    'text' => 'Forget about having to buy separate train, plane and cab tickets. Our platform allows you to combine all modes of transportation into one convenient ticket.'
                ],
                'search' => [
                    'title' => 'Searcher',
                    'text' => "Our smart search will help you find the best route, taking into account different modes of transportation, travel time and cost. You can choose a suggested option or customize the route according to your preferences."
                ],
                'comfort' => [
                    'title' => "Simplicity and convenience",
                    'text' => 'We make the ticket booking process as simple and convenient as possible. Our intuitive platform allows you to quickly and easily select your itinerary, enter the required data and finalize your payment.'
                ],
                'money' => [
                    'title' => "Saving time and money",
                    'text' => 'With Nticket, you save time searching for and buying tickets and get the opportunity to save money with optimal route selection and special offers'
                ]
            ]
        ],
        'request' => [
            'title' => 'Send your application',
            'text' => 'For a detailed consultation, enter your details in this form and we will call you back shortly.',
            'inputs' => [
                'name' => [
                    'label' => 'Name:',
                    'placeholder' => 'Enter your name'
                ],
                'phone' => [
                    'label' => 'Phone:',
                    'placeholder' => 'Enter your phone number'
                ]
            ],
            'submit' => 'Send'
        ],
        'mission' => [
            'title' => 'Our mission',
            'text' => 'We strive to simplify the travel planning process, making it as comfortable and efficient as possible for our customers. With Nticket, you can forget about the need to buy separate tickets for different modes of transportation - trust us and enjoy the convenience of travel!'
        ],
        'modal' => [
            'title' => 'Request for consultation',
            'close' => 'Close'
        ]
    ],

    'bankCard' => [
        'title' => 'Bank card',
        'inputs' => [
            'fullName' => [
                'label' => 'Name Last Name',
                'placeholder' => 'Enter your first and last name'
            ],
            'number' => [
                'label' => 'Card number',
                'placeholder' => 'Enter your card number'
            ],
            'cvv' => [
                'label' => 'СVV',
                'placeholder' => 'Enter your cvv number'
            ]
        ],
        'buttons' => [
            'submit' => 'Update card data',
            'profile' => 'Account Profile',
            'idCard' => 'ID card'
        ],
        'modal' => [
            'title' => 'Bank card update',
            'close' => 'Close'
        ]
    ],

    'buyTicket' => [
        'title' => 'Buying and creating a hybrid ticket',
        'text' => 'To purchase a hybrid ticket, you must first specify the number of hybrid tickets to be purchased',
        'inputLabels' => [
            'price' => 'Price per ticket:',
            'count' => 'Number of tickets:',
            'sum' => 'Total payable:'
        ],
        'buy' => 'Buy'
    ],
    
    'cart' => [
        'title' => 'Shopping cart',
        'text' => 'This route garbage can is designed specifically for creating a hybrid ticket. Here you have to select the routes you want and combine them into one hybrid itinerary',
        'card' => [
            'title' => 'Details of the trip',
            'info' => [
                'from' => 'Place of departure',
                'to' => 'Place of arrival',
                'departureTime' => 'Date and time of departure',
                'arrivalTime' => 'Date and time of arrival',
                'price' => 'Price',
                'seats' => 'There are seats left',
                'organizator' => 'Organization',
                'transport' => [
                    'text' => 'Transportation',
                    'type' => [
                        'airplane' => 'Airplane',
                        'bus' => 'Bus',
                        'train' => 'Train'
                    ]
                ],
            ],
            'select' => 'Select a route',
            'submit' => 'Send',
            'modal' => [
                'title' => 'Route',
                'close' => 'Close'
            ]
        ]
    ],

    'chatHelp' => [
        'title' => 'Questions and answers',
        'text' => 'Ask your questions on this form and we will respond to the question you ask',
        'form' => [
            'title' => 'Ask your question',
            'label' => 'Your question:',
            'placeholder' => 'Ask your question',
            'submit' => 'Send a question'
        ],
        'noAnswer' => 'Unanswered',
        'noQuestionTitle' => "You haven't asked any questions yet",
        'modal' => [
            'title' => 'Question',
            'close' => 'Close'
        ]
    ],

    'idCard' => [
        'title' => 'ID card',
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Enter your name'
            ],
            'surname' => [
                'label' => 'Surname',
                'placeholder' => 'Enter your surname'
            ],
            'middleName' => [
                'label' => 'Middle name (optional)',
                'placeholder' => 'Enter your middle name'
            ],
            'iin' => [
                'label' => 'IIN',
                'placeholder' => 'Enter your iin'
            ],
            'number' => [
                'label' => 'Document number',
                'placeholder' => 'Enter your document number'
            ],
            'birthDate' => [
                'label' => 'Date of birth'
            ],
            'nationality' => [
                'label' => 'Nationality',
                'placeholder' => 'Enter your nationality'
            ]
        ],
        'buttons' => [
            'submit' => 'Update document data',
            'profile' => 'Account Profile',
            'bankCard' => 'Bank card'
        ],
        'modal' => [
            'title' => 'Renewing your ID card',
            'close' => 'Close'
        ]
    ],

    'myTickets' => [
        'title' => 'My tickets',
        'currency' => 'tg',
        'noTickets' => 'Tickets have not been purchased yet',
        'modal' => [
            'title' => 'The ticket was purchased',
            'close' => 'Close'
        ],
    ],

    'profile' => [
        'title' => 'Account Profile',
        'inputs' => [
            'name' => [
                'label' => 'Name',
                'placeholder' => 'Enter your name'
            ],
            'surname' => [
                'label' => 'Surname',
                'placeholder' => 'Enter your surname'
            ],
            'middleName' => [
                'label' => 'Middle name (optional)',
                'placeholder' => 'Enter your middle name'
            ],
            'iin' => [
                'label' => 'Email',
                'placeholder' => 'Enter your email'
            ],
            'birthDate' => [
                'label' => 'Date of birth'
            ]
        ],
        'buttons' => [
            'submit' => 'Update profile data',
            'idCard' => 'ID card',
            'bankCard' => 'Bank card'
        ],
        'modal' => [
            'title' => 'Profile update',
            'close' => 'Close'
        ]
    ],

    'searchResults' => [
        'form' => [
            'inputs' => [
                'from' => 'SENDING',
                'to' => 'APPENDIX',
                'departureTime' => 'DATE OF DEPARTURE',
                'arrivalTime' => 'ARRIVAL DATE'
            ],
            'submit' => 'Seeking'
        ],
        'route' => [
            'title' => 'Route details',
            'details' => [
                'from' => 'Place of Departure:',
                'to' => 'Arrival location:',
                'departureTime' => 'Date and time of departure:',
                'arrivalTime' => 'Date and time of arrival:',
                'price' => 'Price:',
                'seats' => 'There are seats left:',
                'organizator' => 'Organization:',
                'transport' => [
                    'label' => 'Transportation:',
                    'type' => [
                        'airplane' => 'Airplane',
                        'bus' => 'Bus',
                        'train' => 'Train'
                    ]
                ]
            ],
            'button' => 'In the cart'
        ],
        'modal' => [
            'title' => 'Adding to cart',
            'close' => 'Close'
        ],
        'noRoutes' => 'Routes not found'
    ]
];