# sudo apt update
# sudo apt install ruby-full
# sudo su
# gem install sinatra
# ruby app.rb

require 'sinatra'

# Method to reverse the name
def reverse_name(first_name, last_name)
  "#{last_name} #{first_name}"
end

# Route for the home page
get '/' do
  erb :index
end

# Route to handle POST request and reverse the name
post '/reverse' do
  first_name = params[:first_name] # Get first name from request params
  last_name = params[:last_name]   # Get last name from request params
  @reversed_name = reverse_name(first_name, last_name) # Reverse the name

  erb :reverse # Render reverse view
end
