FROM nginx:alpine

# Eliminar la configuración predeterminada
RUN rm -f /etc/nginx/conf.d/default.conf

# Copiar nuestra configuración
COPY docker/nginx/default.conf /etc/nginx/conf.d/

# Verificar la configuración al iniciar
CMD ["nginx", "-g", "daemon off;"]