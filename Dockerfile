
FROM nginx:latest

COPY html /usr/share/nginx/html

EXPOSE 80


#COMANDOS

# docker build -t portfolio-html .

# docker run -d -p 8080:80 portfolio-hmtl