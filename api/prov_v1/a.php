<?php 
  define("lib_stor", "libs/");
  // $jdf=fopen("chdbd.txt", "a+");
  // fwrite($jdf, "string");
  $rel="" .lib_stor;

  require_once($rel."constant.php");
  require_once($rel."db.php");
  require_once($rel."profile.php");
  require_once($rel."verifier.php");
  require_once($rel."report.php");
  require_once("../"."db_vr.php");

     $sdf="[{\"quote\":\"Life isn’t about getting and having, it’s about giving and being.\", \"name\": \"Kevin Kruse\" }, {" .
                        "\"quote\":\"Whatever the mind of man can conceive and believe, it can achieve.\", \"name\":\"Napoleon Hill\" }, {" .
                        "\"quote\":\"Strive not to be a success, but rather to be of value.\", \"name\":\"Albert Einstein\" }, {" .
                        "\"quote\":\"Two roads diverged in a wood, and I—I took the one less traveled by, And that has made all the difference.\", \"name\":\"Robert Frost\" }, {" .
                        "\"quote\":\"I attribute my success to this: I never gave or took any excuse.\", \"name\":\"Florence Nightingale\" }, {" .
                        "\"quote\":\"You miss 100% of the shots you don’t take.\", \"name\":\"Wayne Gretzky\" }, {" .
                        "\"quote\":\"I’ve missed more than 9000 shots in my career. I’ve lost almost 300 games. 26 times I’ve been trusted to take. \", \"name\":\"Michael Jordan\" }, {" .
                        "\"quote\":\"The most difficult thing is the decision to act, the rest is merely tenacity.\", \"name\":\"Amelia Earhart\" }, {" .
                        "\"quote\":\"Every strike brings me closer to the next home run.\", \"name\":\"Babe Ruth\" }, {" .
                        "\"quote\":\"Definiteness of purpose is the starting point of all achievement.\", \"name\":\"W. Clement Stone\" }, {" .
                        "\"quote\":\"We must balance conspicuous consumption with conscious capitalism.\", \"name\":\"Kevin Kruse\" }, {" .
                        "\"quote\":\"Life is what happens to you while you’re busy making other plans.\", \"name\":\"John Lennon\" }, {" .
                        "\"quote\":\"We become what we think about.\", \"name\":\"Earl Nightingale\" }, {" .
                        "\"quote\":\"Twenty years from now you will be more disappointed by the things that you didn’t do than by the ones you did. \", \"name\":\"Mark Twain\" }, {" .
                        "\"quote\":\"Life is 10% what happens to me and 90% of how I react to it.\", \"name\":\"Charles Swindoll\" }, {" .
                        "\"quote\":\"The most common way people give up their power is by thinking they don’t have any.\", \"name\":\"Alice Walker\" }, {" .
                        "\"quote\":\"The mind is everything. What you think you become.\", \"name\":\"Buddha\" }, {" .
                        "\"quote\":\"The best time to plant a tree was 20 years ago. The second best time is now.\", \"name\":\"Chinese Proverb\" }, {" .
                        "\"quote\":\"An unexamined life is not worth living.\", \"name\":\"Socrates\" }, {" .
                        "\"quote\":\"Eighty percent of success is showing up.\", \"name\":\"Woody Allen\" }, {" .
                        "\"quote\":\"Your time is limited, so don’t waste it living someone else’s life.\", \"name\":\"Steve Jobs\" }, {" .
                        "\"quote\":\"Winning isn’t everything, but wanting to win is.\", \"name\":\"Vince Lombardi\" }, {" .
                        "\"quote\":\"I am not a product of my circumstances. I am a product of my decisions.\", \"name\":\"Stephen Covey\" }, {" .
                        "\"quote\":\"Every child is an artist.  The problem is how to remain an artist once he grows up.\", \"name\":\"Pablo Picasso\" }, {" .
                        "\"quote\":\"You can never cross the ocean until you have the courage to lose sight of the shore.\", \"name\":\"Christopher Columbus\" }, {" .
                        "\"quote\":\"I’ve learned that people will forget what you said, people will forget what you did, but people will never fo \", \"name\":\"Maya Angelou\" }, {" .
                        "\"quote\":\"Either you run the day, or the day runs you.\", \"name\":\"Jim Rohn\" }, {" .
                        "\"quote\":\"Whether you think you can or you think you can’t, you’re right.\", \"name\":\"Henry Ford\" }, {" .
                        "\"quote\":\"The two most important days in your life are the day you are born and the day you find out why.\", \"name\":\"Mark Twain\" }, {" .
                        "\"quote\":\"Whatever you can do, or dream you can, begin it.  Boldness has genius, power and magic in it.\", \"name\":\"Johann Wolfgang von Goethe\" }, {" .
                        "\"quote\":\"The best revenge is massive success.\", \"name\":\"Frank Sinatra\" }, {" .
                        "\"quote\":\"People often say that motivation doesn’t last. Well, neither does bathing.  That’s why we recommend it daily.\",\"name\":\"Zig Ziglar\" }, {" .
                        "\"quote\":\"Life shrinks or expands in proportion to one’s courage.\", \"name\":\"Anais Nin\" }, {" .
                        "\"quote\":\"If you hear a voice within you say “you cannot paint,” then by all means paint and that voice will be silence.\", \"name\":\"Vincent Van Gogh\" }, {" .
                        "\"quote\":\"There is only one way to avoid criticism: do nothing, say nothing, and be nothing.\", \"name\":\"Aristotle\" }, {" .
                        "\"quote\":\"Ask and it will be given to you; search, and you will find; knock and the door will be opened for you.\", \"name\":\"Jesus\" }, {" .
                        "\"quote\":\"The only person you are destined to become is the person you decide to be.\", \"name\":\"Ralph Waldo Emerson\" }, {" .
                        "\"quote\":\"Go confidently in the direction of your dreams.  Live the life you have imagined.\", \"name\":\"Henry David Thoreau\" }, {" .
                        "\"quote\":\"When I stand before God at the end of my life, I would hope that I would not have a single bit of talent left. \", \"name\":\"Erma Bombeck\" }, {" .
                        "\"quote\":\"Few things can help an individual more than to place responsibility on him, and to let him know that you trust. \", \"name\":\"Booker T. Washington\" }, {" .
                        "\"quote\":\"Certain things catch your eye, but pursue only those that capture the heart.\", \"name\":\"Ancient Indian Proverb\" }, {" .
                        "\"quote\":\"Believe you can and you’re halfway there.\", \"name\":\"Theodore Roosevelt\" }, {" .
                        "\"quote\":\"Everything you’ve ever wanted is on the other side of fear.\", \"name\":\"George Addair\" }, {" .
                        "\"quote\":\"We can easily forgive a child who is afraid of the dark; the real tragedy of life is when men are afraid of. \", \"name\":\"Plato\" }, {" .
                        "\"quote\":\"Teach thy tongue to say, “I do not know,” and thous shalt progress.\", \"name\":\"Maimonides\" }, {" .
                        "\"quote\":\"Start where you are. Use what you have.  Do what you can.\", \"name\":\"Arthur Ashe\" }, {" .
                        "\"quote\":\"When I was 5 years old, my mother always told me that happiness was the key to life.  When I went to school\", \"name\":\"John Lennon\" }, {" .
                        "\"quote\":\"Fall seven times and stand up eight.\", \"name\":\"Japanese Proverb\" }, {" .
                        "\"quote\":\"When one door of happiness closes, another opens, but often we look so long at the closed door that we do no.\", \"name\":\"Helen Keller\" }, {" .
                        "\"quote\":\"Everything has beauty, but not everyone can see.\", \"name\":\"Confucius\" }, {" .
                        "\"quote\":\"How wonderful it is that nobody need wait a single moment before starting to improve the world.\", \"name\":\"Anne Frank\" }, {" .
                        "\"quote\":\"When I let go of what I am, I become what I might be.\", \"name\":\"Lao Tzu\" }, {" .
                        "\"quote\":\"Life is not measured by the number of breaths we take, but by the moments that take our breath away.\", \"name\":\"Maya Angelou\" }, {" .
                        "\"quote\":\"Happiness is not something readymade.  It comes from your own actions.\", \"name\":\"Dalai Lama\" }, {" .
                        "\"quote\":\"If you’re offered a seat on a rocket ship, don’t ask what seat! Just get on.\", \"name\":\"Sheryl Sandberg\" }, {" .
                        "\"quote\":\"First, have a definite, clear practical ideal; a goal, an objective. Second, have the necessary means to ache. \", \"name\":\"Aristotle\" }, {" .
                        "\"quote\":\"If the wind will not serve, take to the oars.\", \"name\":\"Latin Proverb\" }, {" .
                        "\"quote\":\"You can’t fall if you don’t climb.  But there’s no joy in living your whole life on the ground.\", \"name\":\"Unknown\" }, {" .
                        "\"quote\":\"We must believe that we are gifted for something, and that this thing, at whatever cost, must be attained.\", \"name\":\"Marie Curie\" }, {" .
                        "\"quote\":\"Too many of us are not living our dreams because we are living our fears.\", \"name\":\"Les Brown\" }, {" .
                        "\"quote\":\"Challenges are what make life interesting and overcoming them is what makes life meaningful.\", \"name\":\"Joshua J. Marine\" }, {" .
                        "\"quote\":\"If you want to lift yourself up, lift up someone else.\", \"name\":\"Booker T. Washington\" }, {" .
                        "\"quote\":\"I have been impressed with the urgency of doing. Knowing is not enough; we must apply. Being willing is not. \", \"name\":\"Leonardo da Vinci\" }, {" .
                        "\"quote\":\"Limitations live only in our minds.  But if we use our imaginations, our possibilities become limitless.\", \"name\":\"Jamie Paolinetti\" }, {" .
                        "\"quote\":\"You take your life in your own hands, and what happens? A terrible thing, no one to blame.\", \"name\":\"Erica Jong\" }, {" .
                        "\"quote\":\"What’s money? A man is a success if he gets up in the morning and goes to bed at night and in between does w. \", \"name\":\"Bob Dylan\" }, {" .
                        "\"quote\":\"I didn’t fail the test. I just found 100 ways to do it wrong.\", \"name\":\"Benjamin Franklin\" }, {" .
                        "\"quote\":\"In order to succeed, your desire for success should be greater than your fear of failure.\", \"name\":\"Bill Cosby\" }, {" .
                        "\"quote\":\"A person who never made a mistake never tried anything new.\", \"name\":\"Albert Einstein\" }, {" .
                        "\"quote\":\"The person who says it cannot be done should not interrupt the person who is doing it.\", \"name\":\"Chinese Proverb\" }, {" .
                        "\"quote\":\"There are no traffic jams along the extra mile.\", \"name\":\"Roger Staubach\" }, {" .
                        "\"quote\":\"It is never too late to be what you might have been.\", \"name\":\"George Eliot\" }, {" .
                        "\"quote\":\"You become what you believe.\", \"name\":\"Oprah Winfrey\" }, {" .
                        "\"quote\":\"I would rather die of passion than of boredom.\", \"name\":\"Vincent van Gogh\" }, {" .
                        "\"quote\":\"A truly rich man is one whose children run into his arms when his hands are empty.\", \"name\":\"Unknown\" }, {" .
                        "\"quote\":\"It is not what you do for your children, but what you have taught them to do for themselves, that will make\", \"name\":\"Ann Landers\" }, {" .
                        "\"quote\":\"If you want your children to turn out well, spend twice as much time with them, and half as much money.\", \"name\":\"Abigail Van Buren\" }, {" .
                        "\"quote\":\"Build your own dreams, or someone else will hire you to build theirs.\", \"name\":\"Farrah Gray\" }, {" .
                        "\"quote\":\"The battles that count aren’t the ones for gold medals. The struggles within yourself–the invisible battles. \", \"name\":\"Jesse Owens\" }, {" .
                        "\"quote\":\"Education costs money.  But then so does ignorance.\", \"name\":\"Sir Claus Moser\" }, {" .
                        "\"quote\":\"I have learned over the years that when one’s mind is made up, this diminishes fear.\", \"name\":\"Rosa Parks\" }, {" .
                        "\"quote\":\"It does not matter how slowly you go as long as you do not stop.\", \"name\":\"Confucius\" }, {" .
                        "\"quote\":\"If you look at what you have in life, you’ll always have more. If you look at what you don’t have in life, y \", \"name\":\"Oprah Winfrey\" }, {" .
                        "\"quote\":\"Remember that not getting what you want is sometimes a wonderful stroke of luck.\", \"name\":\"Dalai Lama\" }, {" .
                        "\"quote\":\"You can’t use up creativity.  The more you use, the more you have.\", \"name\":\"Maya Angelou\" }, {" .
                        "\"quote\":\"Dream big and dare to fail.\", \"name\":\"Norman Vaughan\" }, {" .
                        "\"quote\":\"Our lives begin to end the day we become silent about things that matter.\", \"name\":\"Martin Luther King Jr.\" }, {" .
                        "\"quote\":\"Do what you can, where you are, with what you have.\", \"name\":\"Teddy Roosevelt\" }, {" .
                        "\"quote\":\"If you do what you’ve always done, you’ll get what you’ve always gotten.\", \"name\":\"Tony Robbins\" }, {" .
                        "\"quote\":\"Dreaming, after all, is a form of planning.\", \"name\":\"Gloria Steinem\" }, {" .
                        "\"quote\":\"It’s your place in the world; it’s your life. Go on and do all you can with it, and make it the life you want. \", \"name\":\"Mae Jemison\" }, {" .
                        "\"quote\":\"You may be disappointed if you fail, but you are doomed if you don’t try.\", \"name\":\"Beverly Sills\" }, {" .
                        "\"quote\":\"Remember no one can make you feel inferior without your consent.\", \"name\":\"Eleanor Roosevelt\" }, {" .
                        "\"quote\":\"Life is what we make it, always has been, always will be.\", \"name\":\"Grandma Moses\" }, {" .
                        "\"quote\":\"The question isn’t who is going to let me; it’s who is going to stop me.\", \"name\":\"Ayn Rand\" }, {" .
                        "\"quote\":\"When everything seems to be going against you, remember that the airplane takes off against the wind, not wi\", \"name\":\"Henry Ford\" }, {" .
                        "\"quote\":\"It’s not the years in your life that count. It’s the life in your years.\", \"name\":\"Abraham Lincoln\" }, {" .
                        "\"quote\":\"Change your thoughts and you change your world.\", \"name\":\"Norman Vincent Peale\" }, {" .
                        "\"quote\":\"Either write something worth reading or do something worth writing.\", \"name\":\"Benjamin Franklin\" }, {" .
                        "\"quote\":\"Nothing is impossible, the word itself says, “I’m possible!”\", \"name\":\"–Audrey Hepburn\" }, {" .
                        "\"quote\":\"The only way to do great work is to love what you do.\", \"name\":\"Steve Jobs\" }, {" .
                        "\"quote\":\"If you can dream it, you can achieve it.\", \"name\":\"Zig Ziglar\" } ]";

        $string="[ { \"rec_id\": \"57d1f95094880\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Henry Ford\", " .
                        "\"quote\": \"Whether you think you can, or think you " .
                        "can't you're right.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f9509487e\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Steve Jobs\", " .
                        "\"quote\": \"Your work is going to fill a large part of " .
                        "your life, and the only way to be truly satisfied is " .
                        "to do what you believe is great work. And the " .
                        "only way to do great work is to love what you " .
                        "do.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509487f\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Jeff Bezos\", \"quote\": \"I knew " .
                        "that if I failed I wouldn't regret that, but I knew " .
                        "the one thing I might regret is not trying.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094881\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Mary Kay Ash,\", \"quote\": \"Don't " .
                        "limit yourself. Many people limit themselves to " .
                        "what they think they can do. You can go as far " .
                        "as your mind lets you. What you believe, " .
                        "remember, you can achieve.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f9509487c\", " .
                        "\"category\": \"Motivational\", \"author_name\": " .
                        "\"Richard Branson\", \"quote\": \"My biggest " .
                        "motivation? Just to keep challenging myself. I " .
                        "see life almost like one long University education " .
                        "that I never had everyday I'm learning something " .
                        "new.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f9509487d\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Oprah Winfrey\", " .
                        "\"quote\": \"Every time you state what you want or " .
                        "believe, you're the first to hear it. It's a message " .
                        "to both you and others about what you think is " .
                        "possible. Don't put a ceiling on yourself.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094882\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Richard Branson\", \"quote\": \"You " .
                        "don't learn to walk by following rules. You learn " .
                        "by doing and falling over.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094883\", " .
                        "\"category\": \"Motivational\", \"author_name\": \"Josh " .
                        "James\", \"quote\": \"When you find an idea that you " .
                        "just can't stop thinking about, that's probably a " .
                        "good one to pursue.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094884\", " .
                        "\"category\": \"Motivational\", \"author_name\": \"Scott " .
                        "Belsky\", \"quote\": \"It's not about ideas. It's about " .
                        "making ideas happen.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094887\", " .
                        "\"category\": \"Motivational\", \"author_name\": \"Tom " .
                        "Preston\", \"quote\": \"When I'm old and dying, I plan " .
                        "to look back on my life and say wow, that was " .
                        "an adventure, not wow, I sure felt safe.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094886\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Seth Godin\", \"quote\": \"The only " .
                        "thing worse than starting something and failing " .
                        "is not starting something.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094885\", " .
                        "\"category\": \"Motivational\", \"author_name\": " .
                        "\"David Karp\", \"quote\": \"Entrepreneur is someone " .
                        "who has a vision for something and a want to " .
                        "create.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094889\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Warren Buffett\", " .
                        "\"quote\": \"I don't look to jump over 7-foot bars I " .
                        "look for 1-foot bars that I can step over.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094888\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Reid Hoffman\", \"quote\": \"The " .
                        "fastest way to change yourself is to hang out " .
                        "with people who are already the way you want " .
                        "to be.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f9509488a\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Steve Case\", " .
                        "\"quote\": \"In the end, a vision without the ability " .
                        "to execute it is probably a hallucination.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509488b\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Arianna Huffington\", \"quote\": " .
                        "\"Fearlessness is like a muscle. I know from my " .
                        "own life that the more I exercise it the more " .
                        "natural it becomes to not let my fears run me.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509488c\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Sara Blakely\", \"quote\": " .
                        "\"Embrace what you don't know, especially in the " .
                        "beginning, because what you don't know can " .
                        "become your greatest asset. It ensures that you " .
                        "will absolutely be doing things different from " .
                        "everybody else.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f9509488e\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Walt Disney\", " .
                        "\"quote\": \"The way to get started is to quit " .
                        "talking and begin doing.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f9509488d\", " .
                        "\"category\": \"Motivational\", \"author_name\": " .
                        "\"Howard Schultz\", \"quote\": \"Risk more than " .
                        "others think is safe. Dream more than others " .
                        "think is practical.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f9509488f\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Sam Walton\", " .
                        "\"quote\": \"High expectations are the key to " .
                        "everything.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094890\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Michael " .
                        "Bloomberg\", \"quote\": \"Don't be afraid to assert " .
                        "yourself, have confidence in your abilities and " .
                        "don't let the bastards get you down.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094891\", \"category\": \"Motivational\", " .
                        "\"author_name\": \"Phil Libin\", \"quote\": \"There's " .
                        "lots of bad reasons to start a company. But " .
                        "there's only one good, legitimate reason, and I " .
                        "think you know what it is: it's to change the " .
                        "world.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094894\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Steve Case\", " .
                        "\"quote\": \"You shouldn't focus on why you can't " .
                        "do something, which is what most people do. " .
                        "You should focus on why perhaps you can, and " .
                        "be one of the exceptions.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094892\", " .
                        "\"category\": \"Motivational\", \"author_name\": \"Ben " .
                        "Weissenstein\", \"quote\": \"Everything started as " .
                        "nothing.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094895\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Catharina " .
                        "Bruns\", \"quote\": \"Empower yourself and realize " .
                        "the importance of contributing to the world by " .
                        "living your talent. Work on what you love. You " .
                        "are responsible for the talent that has been " .
                        "entrusted to you.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f95094899\", \"category\": " .
                        "\"Hard Work\", \"author_name\": \"Jack Dorsey\", " .
                        "\"quote\": \"Make every detail perfect and limit the " .
                        "number of details to perfect.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f95094896\", " .
                        "\"category\": \"Hard Work\", \"author_name\": \"Vince " .
                        "Lombardi\", \"quote\": \"The price of success is " .
                        "hard work, dedication to the job at hand, and the " .
                        "determination that whether we win or lose, we " .
                        "have applied the best of ourselves to the task at " .
                        "hand.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094897\", \"category\": \"Hard " .
                        "Work\", \"author_name\": \"Steve Jobs\", \"quote\": " .
                        "\"I'm convinced that about half of what separates " .
                        "the successful entrepreneurs from the non- " .
                        "successful ones is pure perseverance.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f95094898\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"Pierre Omidyar\", \"quote\": \"If " .
                        "you're passionate about something and you work " .
                        "hard, then I think you will be successful.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509489a\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"Guy Kawasaki\", \"quote\": \"Ideas " .
                        "are easy. Implementation is hard.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509489c\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"Caterina Fake\", \"quote\": \"So " .
                        "often people are working hard at the wrong " .
                        "thing. Working on the right thing is probably " .
                        "more important than working hard.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509489b\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"Bill Gates\", \"quote\": \"I never " .
                        "took a day off in my twenties. Not one.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509489d\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"James Cash Penney\", \"quote\": " .
                        "\"It is always the start that requires the greatest " .
                        "effort.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f95094893\", \"category\": " .
                        "\"Motivational\", \"author_name\": \"Debbi Fields\", " .
                        "\"quote\": \"The important thing is not being afraid " .
                        "to take a chance. Remember, the greatest " .
                        "failure is to not try. Once you find something you " .
                        "love to do, be the best at doing it.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f9509489e\", \"category\": \"Hard Work\", " .
                        "\"author_name\": \"Claude McDonald\", \"quote\": \"If " .
                        "hard work is the key to success, most people " .
                        "would rather pick the lock.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f9509489f\", " .
                        "\"category\": \"Hard Work\", \"author_name\": \"Ryan " .
                        "Allis\", \"quote\": \"Have the end in mind and every " .
                        "day make sure your working towards it.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948a0\", \"category\": \"Success\", " .
                        "\"author_name\": \"Thomas Edison\", \"quote\": \"I " .
                        "have not failed. I've just found 10,000 ways that " .
                        "won't work.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948a2\", \"category\": " .
                        "\"Success\", \"author_name\": \"Drew Houston\", " .
                        "\"quote\": \"Don't worry about failure; you only have " .
                        "to be right once.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948a1\", \"category\": " .
                        "\"Success\", \"author_name\": \"Winston Churchill\", " .
                        "\"quote\": \"Success is walking from failure to " .
                        "failure with no loss of enthusiasm.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948a4\", \"category\": \"Success\", " .
                        "\"author_name\": \"Adam Osborne\", \"quote\": \"The " .
                        "most valuable thing you can make is a mistake " .
                        "you can't learn anything from being perfect.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948a3\", \"category\": \"Success\", " .
                        "\"author_name\": \"Tom Kelley\", \"quote\": \"Fail often " .
                        "so you can succeed sooner.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948a5\", " .
                        "\"category\": \"Success\", \"author_name\": \"Henry " .
                        "Ford\", \"quote\": \"Failure is simply the opportunity " .
                        "to begin again, this time more intelligently. A " .
                        "business absolutely devoted to service will have " .
                        "only one worry about profits. They will be " .
                        "embarrassingly large.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948a7\", " .
                        "\"category\": \"Success\", \"author_name\": \"William " .
                        "Rosenberg\", \"quote\": \"Show me a person who " .
                        "never made a mistake, and I will show you a " .
                        "person who never did anything.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948a8\", " .
                        "\"category\": \"Success\", \"author_name\": \"Marc " .
                        "Benioff,\", \"quote\": \"The secret to successful " .
                        "hiring is this: look for the people who want to " .
                        "change the world.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948a6\", \"category\": " .
                        "\"Success\", \"author_name\": \"Jack Welch\", " .
                        "\"quote\": \"I have learned that mistakes can often " .
                        "be as good a teacher as success.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948a9\", \"category\": \"Success\", " .
                        "\"author_name\": \"Dale Carnegie\", \"quote\": " .
                        "\"Success is getting what you want. Happiness is " .
                        "wanting what you get.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948aa\", " .
                        "\"category\": \"Success\", \"author_name\": \"Ingvar " .
                        "Kamprad\", \"quote\": \"The most dangerous poison " .
                        "is the feeling of achievement. The antidote is to " .
                        "every evening think what can be done better " .
                        "tomorrow.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948ab\", \"category\": " .
                        "\"Success\", \"author_name\": \"John F. Kennedy\", " .
                        "\"quote\": \"Once you say you're going to settle for " .
                        "second, that's what happens to you in life.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948ac\", \"category\": \"Success\", " .
                        "\"author_name\": \"Robert Kiyosaki\", \"quote\": " .
                        "\"When times are bad is when the real " .
                        "entrepreneurs emerge.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948ae\", " .
                        "\"category\": \"Success\", \"author_name\": \"Brian " .
                        "Tracy\", \"quote\": \"If what you are doing is not " .
                        "moving you towards your goals, then it's moving " .
                        "you away from your goals\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948ad\", " .
                        "\"category\": \"Success\", \"author_name\": " .
                        "\"Napoleon Hill\", \"quote\": \"Most great people " .
                        "have attained their greatest success just one " .
                        "step beyond their greatest failure.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948af\", \"category\": \"Success\", " .
                        "\"author_name\": \"Bo Bennett,\", \"quote\": \"Success " .
                        "is not in what you have, but who you are.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948b0\", \"category\": \"Success\", " .
                        "\"author_name\": \"Jeffery Gitomer\", \"quote\": " .
                        "\"Failure is not about insecurity, it's about lack of " .
                        "execution.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948b1\", \"category\": " .
                        "\"Success\", \"author_name\": \"Mark Kumar\", " .
                        "\"quote\": \"Secrete to achieving your goals faster " .
                        "is 10% planning and 90% execution. It's that " .
                        "simple!\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948b3\", \"category\": " .
                        "\"Business\", \"author_name\": \"Tim Westergen\", " .
                        "\"quote\": \"Make your team feel respected, " .
                        "empowered and genuinely excited about the " .
                        "company's mission.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948b2\", " .
                        "\"category\": \"Business\", \"author_name\": \"Dave " .
                        "Thomas\", \"quote\": \"What do you need to start a " .
                        "business? Three simple things: know your " .
                        "product better than anyone, know your customer, " .
                        "and have a burning desire to succeed.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948b4\", \"category\": \"Business\", " .
                        "\"author_name\": \"Bill Gates\", \"quote\": \"Your most " .
                        "unhappy customers are your greatest source of " .
                        "learning.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948b6\", \"category\": " .
                        "\"Business\", \"author_name\": \"Lisa Stone\", " .
                        "\"quote\": \"Wonder what your customer really " .
                        "wants? Ask. Don't tell.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948b5\", " .
                        "\"category\": \"Business\", \"author_name\": \"Mark " .
                        "Zuckerberg\", \"quote\": \"If you just work on stuff " .
                        "that you like and you're passionate about, you " .
                        "don't have to have a master plan with how " .
                        "things will play out.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948b9\", " .
                        "\"category\": \"Business\", \"author_name\": \"Chris " .
                        "Dixon\", \"quote\": \"Get big quietly, so you don't tip " .
                        "off potential competitors.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948b8\", " .
                        "\"category\": \"Business\", \"author_name\": \"Tony " .
                        "Hsieh\", \"quote\": \"Chase the vision, not the " .
                        "money, the money will end up following you.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948b7\", \"category\": \"Business\", " .
                        "\"author_name\": \"Tim O'Reilly\", \"quote\": \"Money " .
                        "is like gasoline during a road trip. You don't want " .
                        "to run out of gas on your trip, but you're not " .
                        "doing a tour of gas stations.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948ba\", " .
                        "\"category\": \"Business\", \"author_name\": \"Tony " .
                        "Hsieh\", \"quote\": \"Don't play games that you don't " .
                        "understand, even if you see lots of other people " .
                        "making money from them.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948bb\", " .
                        "\"category\": \"Business\", \"author_name\": \"Larry " .
                        "Page\", \"quote\": \"Always deliver more than " .
                        "expected.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948bd\", \"category\": " .
                        "\"Business\", \"author_name\": \"Russell Simmons\", " .
                        "\"quote\": \"You just have to pay attention to what " .
                        "people need and what has not been done.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948bc\", \"category\": \"Business\", " .
                        "\"author_name\": \"Pete Cashmore\", \"quote\": \"We " .
                        "are really competing against ourselves, we have " .
                        "no control over how other people perform.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948be\", \"category\": \"Business\", " .
                        "\"author_name\": \"Reid Hoffman\", \"quote\": \"No " .
                        "matter how brilliant your mind or strategy, if " .
                        "you're playing a solo game, you'll always lose " .
                        "out to a team.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948bf\", \"category\": " .
                        "\"Business\", \"author_name\": \"Steve Jobs\", " .
                        "\"quote\": \"You can't ask customers what they " .
                        "want and then try to give that to them. By the " .
                        "time you get it built, they'll want something " .
                        "new.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948c0\", \"category\": " .
                        "\"Business\", \"author_name\": \"Peter Schultz\", " .
                        "\"quote\": \"Hire character. Train skill.\", \"vote_like\": " .
                        "\"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948c1\", \"category\": \"Business\", " .
                        "\"author_name\": \"E.M Kelly\", \"quote\": \"The " .
                        "difference between a boss and a leader: a boss " .
                        "says, Go! a leader says, Let's go!\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948c3\", " .
                        "\"category\": \"Business\", \"author_name\": \"Richard " .
                        "Harroch\", \"quote\": \"It's almost always harder to " .
                        "raise capital than you thought it would be, and it " .
                        "always takes longer. So plan for that.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948c2\", \"category\": \"Business\", " .
                        "\"author_name\": \"Henry Ford,\", \"quote\": \"A " .
                        "business that makes nothing but money is a poor " .
                        "business.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948c5\", \"category\": " .
                        "\"Business\", \"author_name\": \"Jim Rohn\", \"quote\": " .
                        "\"Effective communication is 20% what you know " .
                        "and 80% how you feel about what you know.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948c4\", \"category\": \"Business\", " .
                        "\"author_name\": \"Margaret Wheatley\", \"quote\": " .
                        "\"The things we fear the most in organizations- " .
                        "fluctuations, disturbances, imbalances are the " .
                        "primary sources of creativity.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948c7\", " .
                        "\"category\": \"Business\", \"author_name\": \"Aaron " .
                        "Patzer\", \"quote\": \"Turn a perceived risk into an " .
                        "asset.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948c8\", \"category\": " .
                        "\"Business\", \"author_name\": \"Jason Cohen\", " .
                        "\"quote\": \"It's more effective to do something " .
                        "valuable than to hope a logo or name will say it " .
                        "for you.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948c6\", \"category\": " .
                        "\"Business\", \"author_name\": \"Garrett Camp\", " .
                        "\"quote\": \"Stay self-funded as long as possible.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948c9\", \"category\": \"Business\", " .
                        "\"author_name\": \"Noah Everett\", \"quote\": \"Don't " .
                        "worry about funding if you don't need it. Today " .
                        "it's cheaper to start a business than ever.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948ca\", \"category\": \"Business\", " .
                        "\"author_name\": \"Sean Rad\", \"quote\": \"Data beats " .
                        "emotions.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948cb\", \"category\": " .
                        "\"Business\", \"author_name\": \"Anthony Volodkin\", " .
                        "\"quote\": \"Be undeniably good. No marketing " .
                        "effort or social media buzzword can be a " .
                        "substitute for that.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948cd\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Tony Hsieh\", \"quote\": \"Don't be cocky. Don't be " .
                        "flashy. There's always someone better than " .
                        "you.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948cc\", \"category\": " .
                        "\"Business\", \"author_name\": \"Mark Cuban\", " .
                        "\"quote\": \"Make your product easier to buy than " .
                        "your competition, or you will find your customers " .
                        "buying from them, not you.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948ce\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Reid " .
                        "Hoffman\", \"quote\": \"All humans are " .
                        "entrepreneurs not because they should start " .
                        "companies but because the will to create is " .
                        "encoded in human DNA.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948cf\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Reid " .
                        "Hoffman\", \"quote\": \"Before dreaming about the " .
                        "future or marking plans, you need to articulate " .
                        "what you already have going for you as " .
                        "entrepreneurs do.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948d0\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Roy Ash,\", " .
                        "\"quote\": \"An entrepreneur tends to bite off a " .
                        "little more than he can chew hoping he'll quickly " .
                        "learn how to chew it.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948d1\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Tony Hsieh\", \"quote\": \"Chase the vision, not the " .
                        "money; the money will end up following you.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948d2\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Todd Garland\", \"quote\": \"Openly " .
                        "share and talk to people about your idea. Use " .
                        "their lack of interest or doubt to fuel your " .
                        "motivation to make it happen.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948d4\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Mark Kumar\", \"quote\": \"Help other people get " .
                        "what they want and you will always have a job.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948d3\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Steve Jobs\", \"quote\": \"Design is " .
                        "not just what it looks like and feels like. Design " .
                        "is how it works.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948d5\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Steve Jobs\", " .
                        "\"quote\": \"I'm convinced that about half of what " .
                        "separates the successful entrepreneurs from the " .
                        "non-successful ones is pure perseverance.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948d6\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Confucius\", \"quote\": \"Choose a " .
                        "job that you like, and you will never have to work " .
                        "a day in your life.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948d7\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Albert Einstein\", " .
                        "\"quote\": \"A person who never made a mistake " .
                        "never tried anything new.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948d9\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Winston Churchill\", \"quote\": \"If you are going " .
                        "through hell, keep going.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948d8\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Garrett Camp\", \"quote\": \"Stay self-funded as " .
                        "long as possible.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948da\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Michelangelo\", " .
                        "\"quote\": \"The greater danger for most of us lies " .
                        "not in setting our aim too high and falling short, " .
                        "but in setting our aim too low and achieving our " .
                        "mark.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948db\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Richard " .
                        "Branson\", \"quote\": \"Business opportunities are " .
                        "like buses: there's always another one coming.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948dc\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Sheryl Sandberg\", \"quote\": " .
                        "\"Done is better than perfect.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948dd\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Theodore Roosevelt\", \"quote\": \"When you're at " .
                        "the end of your rope, tie a knot and hold on\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948de\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Tony Robbins\", \"quote\": \"If you " .
                        "do what you've always done, you'll get what " .
                        "you've always gotten.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948e1\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Vince Lombardi\", \"quote\": \"Winners never quit " .
                        "and quitters never win\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948df\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Socrates\", \"quote\": \"The secret of change is to " .
                        "focus all of your energy, not on fighting the old, " .
                        "but on building the new\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948e0\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Richard Harroch\", \"quote\": \"If you want to build " .
                        "a successful business, make sure you have three " .
                        "things'a big market opportunity, great people, " .
                        "and more than enough capital.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948e6\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Ted " .
                        "Turner\", \"quote\": \"Early to bed, early to rise, work " .
                        "like hell and advertise\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948e3\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Jack " .
                        "Dorsey\", \"quote\": \"Everyone has an idea, but it's " .
                        "really about executing the idea and attracting " .
                        "other people to help you with the idea.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948e2\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Mark Twain\", \"quote\": \"The " .
                        "secret of getting ahead is getting started.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948e4\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Seth Godin\", \"quote\": \"Waiting " .
                        "for perfect is never as smart as making " .
                        "progress.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948e5\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Dave Barry\", " .
                        "\"quote\": \"If you had to identify, in one word, the " .
                        "reason why the human race has not achieved, " .
                        "and never will achieve, its full potential, that " .
                        "word would be meetings.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948e7\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Meg " .
                        "Whitman\", \"quote\": \"The price of inaction is far " .
                        "greater than then cost of a mistake.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948e9\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Robin Williams\", \"quote\": \"I " .
                        "stand up on my desk to remind myself that we " .
                        "must constantly look at things in a different " .
                        "way.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948e8\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Claire Cook\", " .
                        "\"quote\": \"If Plan A doesn't work, the alphabet " .
                        "has 25 more letters.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948eb\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": " .
                        "\"Thomas Edison\", \"quote\": \"If you had asked " .
                        "people what they wanted, they would have said " .
                        "a faster horse.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948ea\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Henry Ford\", " .
                        "\"quote\": \"If you had asked people what they " .
                        "wanted, they would have said a faster horse.\", " .
                        "\"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948ec\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Thomas Edison\", \"quote\": \"Many " .
                        "of life's failures are people who did not realize " .
                        "how close they were to success when they gave " .
                        "up.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, { \"rec_id\": " .
                        "\"57d1f950948ed\", \"category\": \"Entrepreneur\", " .
                        "\"author_name\": \"Muhammad Ali\", \"quote\": \"I " .
                        "hated every minute of training, but I said, Don't " .
                        "quit. Suffer now and live the rest of your life as " .
                        "a champion.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948f1\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Dale Carnegie\", " .
                        "\"quote\": \"Act enthusiastic and you will be " .
                        "enthusiastic.\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948ef\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Zig Ziglar\", " .
                        "\"quote\": \"You can have everything you want in " .
                        "life if you just help enough people get what they " .
                        "want in life\", \"vote_like\": \"\", \"vote_dislike\": \"\" }, " .
                        "{ \"rec_id\": \"57d1f950948f0\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Wayne Gretzky\", " .
                        "\"quote\": \"100 percent of the shots you don't " .
                        "take, don't go in.\", \"vote_like\": \"\", \"vote_dislike\": " .
                        "\"\" }, { \"rec_id\": \"57d1f950948ee\", \"category\": " .
                        "\"Entrepreneur\", \"author_name\": \"Lou Holtz\", " .
                        "\"quote\": \"Never tell your problems to anyone... " .
                        "20 percent don't care and the other 80 percent " .
                        "are glad you have them.\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" }, { \"rec_id\": \"57d1f950948f2\", " .
                        "\"category\": \"Entrepreneur\", \"author_name\": \"Tim " .
                        "Westergen\", \"quote\": \"Make your team feel " .
                        "respected, empowered, and genuinely excited " .
                        "about the company's mission\", \"vote_like\": \"\", " .
                        "\"vote_dislike\": \"\" } ]";


	$tyy=json_decode($sdf);
	$time=time();
	foreach ($tyy as $key => $value) {
		# code...
		// echo $value[$key]['quote'];
		$quote=sanitizeString($value->quote);
		$author=sanitizeString($value->name);
		$type="Motivational";
		$qu="INSERT INTO provapp_pro VALUES (NULL, '$author', '$quote', '$type', $time)";
		queryMysql($qu);
	}

	$tyy=json_decode($string);
	$time=time();
	foreach ($tyy as $key => $value) {
		# code...
		// echo $value[$key]['quote'];
		$quote=sanitizeString($value->quote);
		$author=sanitizeString($value->author_name);
		$type=$value->category;
		$qu="INSERT INTO provapp_pro VALUES (NULL, '$author', '$quote', '$type', $time)";
		queryMysql($qu);
	}
	// print_r($tyy);
	
?>