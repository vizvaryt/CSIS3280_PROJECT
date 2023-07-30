DROP DATABASE IF EXISTS bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE Books
(
    ISBN VARCHAR(500) NOT NULL PRIMARY KEY,
    Author VARCHAR(50) NOT NULL,
    Title VARCHAR(50) NOT NULL,
    Price FLOAT(4,2),
    PublishDate VARCHAR(50) NOT NULL,
    Edition VARCHAR(50),
    Description TEXT NOT NULL,
    Language VARCHAR(50) NOT NULL,
    Fiction BOOLEAN NOT NULL,
    Availability BOOLEAN NOT NULL,
    Bestseller BOOLEAN NOT NULL,
    SoldPerYear INT NOT NULL,
    SoldPerMonth INT NOT NULL,
    SoldPerWeek INT NOT NULL,
    EditorsPick BOOLEAN NOT NULL,
    Textbook BOOLEAN NOT NULL,
    Purchased BOOLEAN NOT NULL DEFAULT FALSE,
    PurchasedUser VARCHAR(50),
    Image VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Users
(
    Email VARCHAR(50) NOT NULL PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    CurrentCart VARCHAR(500),
    PurchasedBooks VARCHAR(5000)
) ENGINE=InnoDB;

INSERT INTO Books VALUES
  ('0-672-31697-8', 'Michael Morgan', 
   'Java 2 for Professional Developers', 34.99,
   'January 1st 2021', 'First', 'A book about Java coding',
   'English', FALSE, FALSE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, NULL, 'img/0.jpg'
   ),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99,
  'December 25th 1990', 'Third', 'A book for Linux beginners',
   'English', FALSE, TRUE, FALSE, 12, 1, 0, FALSE, TRUE, FALSE, NULL, 'img/1.jpg'
  ),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99,
  'August 27th 2017', 'Second', 'A book for people who want to learn GIMP',
   'Multi-Language', FALSE, TRUE, FALSE, 60, 5, 1, TRUE, TRUE, FALSE, NULL, 'img/2.jpg'
  ),
  ('0-672-31769-9', 'Thomas Schenk', 
   'Caldera OpenLinux System Administration Unleashed', 49.99,
   'January 1st 2021', 'First', 'An advanced Linux Admin book',
   'English', FALSE, TRUE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, NULL, 'img/3.jpg'
  ),
  (
    '9781501180996','Stephen King','The Outsider',14.99,'June 29th 2020','First','A horror mystery about a supernatural being in a small town','English',TRUE ,TRUE,TRUE,13000,1084,271,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780811204811','Osamu Dazai','No Longer Human',22.95,'January 16th 1973','First','Feeling like a failure in life, protagonist Oba Yozo narrates his experience trying to feel like a normal human being. ','Japanese',TRUE ,TRUE,FALSE,9000,750,188,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781421561325','Junji Ito','Uzumaki',28.93,'October 14th 2013','First','A graphic novel detailing the horrors of a small coastal town being haunted by a spiral','Japanese',TRUE ,TRUE,TRUE,12000,1000,250,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780676973778','Yann Martel','Life of Pi',21,'September 11th 2001','First','After the tragic sinking of a cargo ship, a solitary lifeboat remains bobbing on the wild, blue Pacific. The only survivors from the wreck are a sixteen-year-old boy named Pi, a hyena, a zebra (with a broken leg), a female orangutan—and a 450-pound Royal Bengal tiger.','English',TRUE ,TRUE,TRUE,20000,1667,417,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780060245863','Laura Joffe Numeroff','If You Give A Mouse A Cookie',21.99,'October 5th 1985','First','If a hungry little mouse shows up on your doorstep, you might want to give him a cookie. And if you give him a cookie, he will ask for a glass of milk.','English',TRUE ,TRUE,TRUE,11000,917,230,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780375842207','Markus Zusak','The Book Thief',19.99,'September 10th 2007','First','In 1939 Nazi Germany, a young girl steals books and shares the stories with both her neighbours, and the Jewish man hidden in her basement. ','German',TRUE ,TRUE,FALSE,7500,625,157,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780312924584','Thomas Harris','The Silence Of The Lambs',12.99,'February 14th 1991','First','When a serial murderer is on the loose, young FBI trainee, Clarice Starling, seeks insight into the motive behind this killer by interviewing another serial killer - Dr. Hannibal Lecter','English',TRUE ,TRUE,TRUE,12500,1042,261,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781264851577','Michael W. Passer, et al.','Psychology: Frontiers and Applications',119.95,'February 10th 2023','Eighth','The Eighth Canadian Edition of Passer dives deep into the science of psychology. Clear explanations, engaging examples, and exciting visuals provide a student-friendly introduction to psychology while also maintaining scientific integrity.','English',FALSE,TRUE,FALSE,6000,500,125,FALSE,TRUE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781982185824','Jennette Mccurdy','Im Glad My Mom Died',36.99,'August 8th 2022','First','A heartbreaking and hilarious memoir by iCarly and Sam & Cat star Jennette McCurdy about her struggles as a former child actor—including eating disorders, addiction, and a complicated relationship with her overbearing mother—and how she retook control of her life.','English',FALSE,TRUE,FALSE,7500,625,157,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '978142158620','Inio Asano','Goodnight Punpun',33.99,'March 14th 2016','First','This is Punpun Onodera’s coming-of-age story. His parents’ marriage is falling apart. His dad goes to jail, and his mom goes to the hospital. He has to live with his loser uncle. He has a crush on a girl who lives in a weird cult. Punpun tries talking with God about his problems, but God is a jerk. Punpun keeps hoping things will get better, but they really, really don’t.','Japanese',TRUE,TRUE,TRUE,12000,1000,250,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780241981399','Zadie Smith','White Teeth ',19.99,'September 25th 2017','First','White Teeth is a funny, generous, big-hearted novel, adored by critics and readers alike. Dealing - among many other things - with friendship, love, war, three cultures and three families over three generations, one brown mouse, and the tricky way the past has of coming back and biting you on the ankle, it is a life-affirming, riotous must-read of a book.','English',TRUE,TRUE,FALSE,8500,709,178,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780439023528','Suzanne Collins','The Hunger Games',19.99,'July 2nd 2010','First',' In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.','English',TRUE,TRUE,TRUE,15000,1250,313,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780316327336','Stephenie Meyer','Twilight',22.99,'November 18th 2011','First','Isabella Swans move to Forks, a small, perpetually rainy town in Washington, could have been the most boring move she ever made. But once she meets the mysterious and alluring Edward Cullen, Isabellas life takes a thrilling and terrifying turn.','English',TRUE,TRUE,TRUE,12500,1042,261,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780399226908','Eric Carle','The Very Hungry Caterpillar',14.99,'March 22nd 1994','First','A classic childrens picture book about a caterpillar that is just too hungry. ','English',TRUE,TRUE,TRUE,11500,959,240,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780307588371','Gillian Flynn','Gone Girl',24.95,'April 21st 2014','First','In a story full of surprising twists, Gillian Flynn’s Gone Girl tracks the course of a marriage gone spectacularly wrong. For the protagonists, it’s a psychological battle with everything at stake; for the reader, an excavation of human failings and incredible depths of betrayal . . . and a mystery whose resolution is every bit as troubling as its beginning.','English',TRUE,TRUE,FALSE,7200,600,150,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781305633810','Robert Jurmain, et al.','Essentials of Physical Anthropology ',119.37,'March 2nd 2016','Tenth','Concise, well-balanced, and comprehensive, ESSENTIALS OF PHYSICAL ANTHROPOLOGY, 10th Edition, introduces you to physical anthropology with the goal of helping you understand why it is important to know about human evolution.','English',FALSE,TRUE,FALSE,3500,292,73,FALSE,TRUE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781419741876','Jeff Kinney','Diary of A Wimpy Kid: The Last Straw',19.99,'December 31st 2008','Third','The highly anticipated third book in the critically acclaimed and bestselling series takes the art of being wimpy to a whole new level.','English',TRUE,TRUE,FALSE,7250,605,152,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780593158111','Mojang Ab','Minecraft: Guide To Survival ',17.5,'October 3rd 2022','Second','Discover how to find resources, craft equipment, protect yourself from hostile mobs and so much more. Also includes expert tips on how to survive in the Nether and the End.','English',TRUE,TRUE,FALSE,3500,292,73,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781472241443','Andrew O’neill','A History of Heavy Metal',26.99,'November 5th 2018','First','The history of heavy metal brings brings us extraordinary stories of larger-than-life characters living to excess, from the household names of Ozzy Osbourne, Lemmy, Bruce Dickinson and Metallica (SIT DOWN, LARS!), to the brutal notoriety of the underground Norwegian black metal scene and the New Wave Of British Heavy Metal.','English',FALSE,TRUE,FALSE,2750,230,58,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780441013593','Frank Herbert','Dune',24,'August 1st 2005','First','Set on the desert planet Arrakis, Dune is the story of Paul Atreides—who would become known as Muad’Dib—and of a great family’s ambition to bring to fruition humankind’s most ancient and unattainable dream.','English',TRUE,TRUE,TRUE,12000,1000,250,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9780747532699','J.K. Rowling','Harry Potter and the Philosopher’s Stone',29.99,'June 26th 1997','First','Harry Potter and the Philosopher’s Stone follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry.','English',TRUE,TRUE,TRUE,24000,2000,500,TRUE,FALSE,FALSE, NULL, 'img/0.jpg'
  ),
  (
    '9781338752168','R.L. Stine','Goosebumps: Slappy in Dreamland',8.99,'February 28th 2022','Sixteenth','Richard Hsieh’s life is about to become a total nightmare. His dad studies dreams and they hook his new Slappy doll up to the dream machine as a joke. All of a sudden, Richard’s dreams are becoming scarier and scarier.','English',TRUE,TRUE,FALSE,450,38,10,FALSE,FALSE,FALSE, NULL, 'img/0.jpg'
  );

INSERT INTO Users VALUES
  (
    'admin@admin.com', 'Admin', 'Debug', '6043100001', '123 Austin Ave', '2000-01-01',
    '$2y$10$UlhBlEkjF9vos3we41tLSORFh.froH1r2fuQsudqBntiedkDq68fq', NULL, NULL
  );