FROM node:20-alpine

WORKDIR /app
COPY . .

RUN npm install && npm run build

CMD npx serve -s dist/testlav -l ${PORT:-8080}
