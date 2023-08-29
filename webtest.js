const quizData = [
    {
      question: 'What term describes a malicious attack where an attacker inputs code into a web application input fields, leading to unauthorized access or data manipulation?',
      options: ['SQL Injection', 'Cross-Site Scripting (XSS)', 'Cross-Site Request Forgery (CSRF)', 'Distributed Denial of Service (DDoS)'],
      answer: 'SQL Injection',
    },
    {
      question: 'Which type of web-based attack involves tricking a user into clicking on a link that directs them to a malicious website that resembles a legitimate one?',
      options: ['Phishing','Ransomware','Spoofing','Man-in-the-Middle (MitM) attack'],
      answer: 'Phishing',
    },
    {
      question: 'What vulnerability allows an attacker to execute arbitrary code on a server by tricking the server into including malicious files?',
      options: ['XML Injection', 'Command Injection', 'Remote Code Execution', 'Directory Traversal'],
      answer: 'Remote Code Execution',
    },
    {
      question: 'Which web-based attack involves an attacker intercepting and modifying communication between two parties, often without either party knowledge?',
      options: ['SQL Injection', 'Cross-Site Scripting (XSS)','Man-in-the-Middle (MitM) attack','Clickjacking'],
      answer: 'Man-in-the-Middle (MitM) attack',
    },
    {
      question: 'What kind of attack attempts to overwhelm a web server by sending a large number of requests, causing it to become slow or unresponsive?',
      options: ['Distributed Denial of Service (DDoS)','Cross-Site Scripting (XSS)','SQL Injection','Phishing'],
      answer: 'Distributed Denial of Service (DDoS)',
    },
    {
      question: 'In a Cross-Site Scripting (XSS) attack, which of the following is true?',
      options: [
        'The attacker gains unauthorized access to a database.', 
        'The attacker tricks users into revealing their passwords',
        'The attacker injects malicious code that executes in the users browser', 
        'The attacker steals cookies from the server.'],
      answer: 'The attacker injects malicious code that executes in the users browser',
    },
    {
      question: 'Which type of attack relies on manipulating a users session data, potentially allowing an attacker to perform actions on behalf of the victim?',
      options: [
        'SQL Injection',
        'Cross-Site Scripting (XSS)',
        'Session Hijacking',
        'DNS Spoofing',
      ],
      answer: 'Session Hijacking',
    },
    {
      question: 'What security measure helps prevent Cross-Site Request Forgery (CSRF) attacks?',
      options: ['Using strong passwords', 'Implementing input validation', 'Encrypting data in transit', 'Applying anti-CSRF tokens'],
      answer: 'Applying anti-CSRF tokens',
    },
    {
      question: 'Which web-based attack involves altering the contents of a website to deceive users or trick them into taking malicious actions?',
      options: [
        'Phishing',
        'Clickjacking',
        'Ransomware',
        'Command Injection',
      ],
      answer: 'Clickjacking',
    },
    {
      question: 'In a SQL Injection attack, what is the primary goal of the attacker?',
      options: ['To steal user passwords', 'To manipulate website content', 'To access and manipulate the database', 'To create fake websites'],
      answer: 'To access and manipulate the database',
    },
  ];
  
  const quizContainer = document.getElementById('quiz');
  const resultContainer = document.getElementById('result');
  const submitButton = document.getElementById('submit');
  const retryButton = document.getElementById('retry');
  const showAnswerButton = document.getElementById('showAnswer');
  
  let currentQuestion = 0;
  let score = 0;
  let incorrectAnswers = [];
  
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }
  
  function displayQuestion() {
    const questionData = quizData[currentQuestion];
  
    const questionElement = document.createElement('div');
    questionElement.className = 'question';
    questionElement.innerHTML = questionData.question;
  
    const optionsElement = document.createElement('div');
    optionsElement.className = 'options';
  
    const shuffledOptions = [...questionData.options];
    shuffleArray(shuffledOptions);
  
    for (let i = 0; i < shuffledOptions.length; i++) {
      const option = document.createElement('label');
      option.className = 'option';
  
      const radio = document.createElement('input');
      radio.type = 'radio';
      radio.name = 'quiz';
      radio.value = shuffledOptions[i];
  
      const optionText = document.createTextNode(shuffledOptions[i]);
  
      option.appendChild(radio);
      option.appendChild(optionText);
      optionsElement.appendChild(option);
    }
  
    quizContainer.innerHTML = '';
    quizContainer.appendChild(questionElement);
    quizContainer.appendChild(optionsElement);
  }
  
  function checkAnswer() {
    const selectedOption = document.querySelector('input[name="quiz"]:checked');
    if (selectedOption) {
      const answer = selectedOption.value;
      if (answer === quizData[currentQuestion].answer) {
        score++;
      } else {
        incorrectAnswers.push({
          question: quizData[currentQuestion].question,
          incorrectAnswer: answer,
          correctAnswer: quizData[currentQuestion].answer,
        });
      }
      currentQuestion++;
      selectedOption.checked = false;
      if (currentQuestion < quizData.length) {
        displayQuestion();
      } else {
        displayResult();
      }
    }
  }
  
  function displayResult() {
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'inline-block';
    resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;
  }
  
  function retryQuiz() {
    currentQuestion = 0;
    score = 0;
    incorrectAnswers = [];
    quizContainer.style.display = 'block';
    submitButton.style.display = 'inline-block';
    retryButton.style.display = 'none';
    showAnswerButton.style.display = 'none';
    resultContainer.innerHTML = '';
    displayQuestion();
  }
  
  function showAnswer() {
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'none';
  
    let incorrectAnswersHtml = '';
    for (let i = 0; i < incorrectAnswers.length; i++) {
      incorrectAnswersHtml += `
        <p>
          <strong>Question:</strong> ${incorrectAnswers[i].question}<br>
          <strong>Your Answer:</strong> ${incorrectAnswers[i].incorrectAnswer}<br>
          <strong>Correct Answer:</strong> ${incorrectAnswers[i].correctAnswer}
        </p>
      `;
    }
  
    resultContainer.innerHTML = `
      <p>You scored ${score} out of ${quizData.length}!</p>
      <p>Incorrect Answers:</p>
      ${incorrectAnswersHtml}
    `;
  }
  
  submitButton.addEventListener('click', checkAnswer);
  retryButton.addEventListener('click', retryQuiz);
  showAnswerButton.addEventListener('click', showAnswer);
  
  displayQuestion();