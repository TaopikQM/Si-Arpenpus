<!DOCTYPE html>
<html>

<head>
	<title>Chat</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}

		.chat-container {
			max-width: 400px;
			margin: 20px auto;
			border: 1px solid #ccc;
			border-radius: 10px;
			overflow: hidden;
		}

		.chat-header {
			background-color: #231F20;
			color: #fff;
			padding: 10px;
		}

		.chat-header h2 {
			margin: 0;
			font-size: 18px;
		}

		.chat-messages {
			padding: 10px;
			overflow-y: scroll;
			height: 500px;
		}

		.message {
			margin-bottom: 10px;
		}

		.message .sender {
			font-weight: bold;
			margin-right: 10px;
		}

		.message .circle {
			width: 30px;
			height: 30px;
			border-radius: 50%;
			background-color: #D9D9D9;
			color: #000;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 14px;
			margin-right: 10px;
		}

		.message .timestamp {
			font-size: 12px;
			color: #888;
			margin-bottom: 5px;
		}

		.message .text {
			padding: 8px;
			border-radius: 8px;
			max-width: 70%;
		}

		.message.sent {
			align-self: flex-end;
			text-align: right;
			display: flex;
			direction: rtl;
		}

		.message.sent .text {
			background-color: #D9D9D9;
			color: #000;
		}

		.message.received {
			align-self: flex-start;
			text-align: left;
		}

		.message.received .text {
			background-color: #fff;
			color: #000;
			align-self: flex-start;
		}

		.chat-input {
			display: flex;
			align-items: center;
			padding: 10px;
			background-color: #D9D9D9;
		}

		.chat-input input[type="text"] {
			flex: 1;
			padding: 8px;
			border: none;
			border-radius: 20px;
			margin-right: 10px;
		}

		.chat-input button {
			padding: 8px 16px;
			border: none;
			border-radius: 20px;
			background-color: #128c7e;
			color: #fff;
			cursor: pointer;
		}
	</style>
</head>

<body>
	<header>
		<div class="tabbook">
			<a class="ham" href="<?php echo site_url('Staf_dashboard'); ?>">
				<img src="assets/icon/icon _arrow ios back_.png" alt="kembali">
			</a>
		</div>
	</header>
	<div class="chat-container">
		<div class="chat-header">
			<h2>Chat</h2>
		</div>
		<div class="chat-messages" id="chat-messages">
			<?php foreach ($messages as $message) : ?>
				<div class="message">
					<div class="timestamp"><?php echo $message->timestamp; ?></div>
					<div class="circle"><?php echo substr(($message->sender == $this->session->userdata('user_id')) ? 'You' : 'Other', 0, 1); ?></div>

					<div class="sender"><?php echo ($message->sender == $this->session->userdata('user_id')) ? 'You' : 'Other'; ?></div>
					<div class="text"><?php echo $message->message; ?></div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="chat-input">
			<input type="text" id="message-input" placeholder="Type a message...">
			<button id="send-button">Send</button>
		</div>
	</div>

	<script>
		// Function to add a new message to the chat
		function addMessage(sender, text) {
			const timestamp = new Date().toLocaleTimeString([], {
				hour: '2-digit',
				minute: '2-digit'
			});
			const messageContainer = document.createElement('div');
			messageContainer.classList.add('message', sender === 'You' ? 'sent' : 'received');
			messageContainer.innerHTML = `
                
                <div class="timestamp">${timestamp}</div>
				<div class="circle">${sender[0]}</div>
                
                <div class="text">${text}</div>
            `;
			document.getElementById('chat-messages').appendChild(messageContainer);
		}

		// Function to handle sending a message
		function sendMessage() {
			const input = document.getElementById('message-input');
			const message = input.value.trim();

			if (message !== '') {
				// Add the message to the chat
				addMessage('You', message);
				// Clear the input field
				input.value = '';

				// Send the message to the server via AJAX
				const xhr = new XMLHttpRequest();
				xhr.open('POST', '<?php echo site_url("chat/sendMessage"); ?>', true);
				xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
				xhr.send('message=' + encodeURIComponent(message));
			}
		}

		// Event listener for the send button
		document.getElementById('send-button').addEventListener('click', sendMessage);

		// Event listener for the Enter key on the input field
		document.getElementById('message-input').addEventListener('keydown', (event) => {
			if (event.key === 'Enter') {
				sendMessage();
				event.preventDefault();
			}
		});
	</script>
</body>

</html>