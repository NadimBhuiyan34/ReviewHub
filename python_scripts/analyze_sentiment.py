import sys
from textblob import TextBlob

# Get review text from command-line arguments
review_text = sys.argv[1]

# Perform sentiment analysis
blob = TextBlob(review_text)
polarity = blob.sentiment.polarity  # Sentiment score (-1 to 1)

# Determine sentiment label
if polarity > 0:
    sentiment = "positive"
elif polarity < 0:
    sentiment = "negative"
else:
    sentiment = "neutral"

# Print the result
print(sentiment)
